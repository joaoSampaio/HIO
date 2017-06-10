<?php

namespace App\Console\Commands;

use App\Model\CategoryLevel;
use App\Model\ChallengeLevelUp;
use App\Model\FileHio;
use App\Model\LikedChallengeNotification;
use App\Model\Notification;
use App\Model\NotificationManager;
use Illuminate\Console\Command;
use DateTime;
use App\Model\User;
use App\Model\Challenge;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Inspiring;
use Log;
use Carbon\Carbon;

class EndChallenge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'end_approve_challenge_dois';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ends challenges that have expired';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $now = new DateTime();
            Log::info('end_approve_challenge called nova versao - 04/06/2017');



            $challengesIds = array();
            Challenge::where('judged', '=', 0)->chunk(100, function ($challenges) use ($now, &$challengesIds) {
                foreach ($challenges as $challenge) {

                    $idsUserCompletedChallenge = [];
                    $deadLine = Carbon::parse($challenge->deadLine);
                    $deadLine = $deadLine->addHours(36);
                    $isValid = $now < $deadLine;
                    if (!$isValid) {

                        echo "aaa".$challenge->id;
                        //validar provas e judgments


                        $sonChallengesIds = DB::table('files')->where('files.challenge_id', $challenge->id)
                            ->join('proof_approval', 'proof_approval.proof_id', '=', 'files.id')
                            ->where('proof_approval.judgment', '=', '1')
                            ->groupBy('files.id')
                            ->leftJoin(
                                DB::raw("
                                (select
                                    `proof_approval`.`proof_id`,
                                    COUNT(*) as total_judgment
                                from `proof_approval`
                                group by `proof_approval`.`proof_id`) `p`
                            "), 'files.id', '=', 'p.proof_id')
                            ->select('files.id', 'total_judgment',
                                DB::raw('COUNT(proof_approval.judgment) as positive_judgment'),
                                DB::raw('COUNT(proof_approval.judgment)/total_judgment as percent')
                            )
                            ->havingRaw('percent >= 0.7')
                            ->lists('files.id');


                        $failedProofs = DB::table('files')->where('files.challenge_id', $challenge->id)->whereNotIn('id', $sonChallengesIds)->lists('files.id');

                        //proof can have no votes
                        if(count($failedProofs) == 0){

                        }

                        FileHio::whereIn('id', $sonChallengesIds)
                            ->update([
                                'approved' => true
                            ]);


                        //se a prova pertence a um desafio de lvl up, entao vai actualizar os inprogress e os completed
                        FileHio::whereIn('id', $sonChallengesIds)->chunk(100, function ($files) {
                            foreach ($files as $file) {

                                DB::table('challenges')->where('challenges.id', '=', $file->challenge_id)->where('challenges.challenge_lvl_up_id', '!=', '0')
                                    ->join('challenge_levelup', 'challenges.challenge_lvl_up_id', '=', 'challenge_levelup.id')
                                    ->join('category_level', function($join) use ($file)
                                    {
                                        $join->on('category_level.user_id', '=',  DB::raw("'".$file->user_id."'"));
                                        $join->on('category_level.category_id','=', 'challenge_levelup.category_id');
                                    })->chunk(100, function($data) {
                                        // Process the records...
                                        echo "data:".json_encode($data);
                                        //[{"id":1,"uuid":"ee5249c7-58fd-4cc1-bcc0-de70edecf609",
//                                        "title":"Leg press 40kg","public":1,"description":"Leg press 40kg 3 reps",
//                                        "reward":"","penalty":"","deadLine":"2017-05-18 14:47:18",
//                                        "created_at":"2017-05-20 12:47:32","updated_at":"2017-05-20 12:47:32","closed":1,"creator_id":2,
//                                        "judged":0,"reminded":0,"rank":0,"secret":0,"category_id":1,"challenge_lvl_up_id":1,
//                                        "sub_title":"3 reps","level":0,"difficulty":0,"group_challenge":0,"user_id":2,
//                                        "deadLineLvl":"2017-05-27 12:47:32","inProgress":"0","completedGroups":""}]
                                        foreach ($data as $db) {

                                            //'category_id','user_id',  'level', 'deadLineLvl', 'inProgress', 'completedGroups'
                                            $catLevel = CategoryLevel::where('category_id', '=', $db->category_id)
                                                ->where('user_id', '=', $db->user_id)->first();
                                            $catLevel->addCompleted($db->group_challenge);
                                            $catLevel->save();


                                            //'title','sub_title', 'category_id', 'level', 'difficulty', 'group_challenge'
                                            $groups = ChallengeLevelUp::where('category_id', '=', $db->category_id)
                                                ->where('level', '=', $db->level)->groupBy('group_challenge')->get();

                                            Log::info('getCountCompleted:'.$catLevel->getCountCompleted());
                                            Log::info('ChallengeLevelUp total groups count:'.count($groups));
                                            echo "<br>getCountCompleted:".$catLevel->getCountCompleted();
                                            echo "<br>count".count($groups);
                                            if($catLevel->getCountCompleted() == count($groups)){
                                                $catLevel->level = $catLevel->level+1;
                                                $catLevel->inProgress = "";
                                                $catLevel->completedGroups = "";
                                                $catLevel->failedGroups = "";
                                                $catLevel->deadLineLvl = null;
                                                $catLevel->save();
                                            }
                                        }
                                    });
                            }
                        });

                        array_push($challengesIds, $challenge->id);





                        //
                        //Check failed proofs after successful files
                        //check if challenge is level up and has any proofs
                        $numProofs = DB::table('files')->where('files.challenge_id', $challenge->id)->count();
                        echo "<br>numProofs->".$numProofs;
                        if($numProofs == 0){
                            $catLevel = CategoryLevel::where('category_id', '=', $challenge->category_id)
                                ->where('user_id', '=', $challenge->creator_id)->first();

                            //get the ChallengeLevelUp by the id stored in the challenge
                            if($challengeLevelUp = ChallengeLevelUp::find($challenge->challenge_lvl_up_id)){
                                $catLevel->addFailed($challengeLevelUp->group_challenge);
                                $catLevel->save();
                            }
                        }
                        echo "<br>qwe";
                        echo "<br>".json_encode($failedProofs);
                        echo "<br>count failed->".count($failedProofs);
                        //failed proofs
                        FileHio::whereIn('id', $failedProofs)->chunk(100, function ($files) {
                            foreach ($files as $file) {
                                echo "<br>inside";
                                DB::table('challenges')->where('challenges.id', '=', $file->challenge_id)->where('challenges.challenge_lvl_up_id', '!=', '0')
                                    ->join('challenge_levelup', 'challenges.challenge_lvl_up_id', '=', 'challenge_levelup.id')
                                    ->join('category_level', function($join) use ($file)
                                    {
                                        $join->on('category_level.user_id', '=',  DB::raw("'".$file->user_id."'"));
                                        $join->on('category_level.category_id','=', 'challenge_levelup.category_id');
                                    })->chunk(100, function($data) {

                                        foreach ($data as $db) {
                                            $catLevel = CategoryLevel::where('category_id', '=', $db->category_id)
                                                ->where('user_id', '=', $db->user_id)->first();
                                            $catLevel->addFailed($db->group_challenge);
                                            $catLevel->save();
                                        }
                                    });
                            }
                        });








                        $users = DB::table('users')
                            ->whereIn('id', function ($query) use ($sonChallengesIds) {
                                $query->from('files')
                                    ->whereIn('id', $sonChallengesIds)
                                    ->select('files.user_id')
                                    ->groupBy('files.user_id');
                            })
                            ->get();

                        foreach ($users as $usertmp) {
                            $user = User::find($usertmp->id);
                            $achievements = $user->achievements;
                            if ($achievements == NULL) {
                                $achievements = array('totalCompleted' => 1);
                            } else {
                                $achievements = json_decode($achievements, true);
                                if (!array_key_exists('totalCompleted', $achievements)) {
                                    $achievements['totalCompleted'] = 1;
                                } else {
                                    $achievements['totalCompleted'] = $achievements['totalCompleted'] + 1;
                                }
                            }
                            $user->achievements = json_encode($achievements);
                            $user->xp = $user->xp + 100;
                            $user->save();

                            $notificationManager = new NotificationManager();
                            $notification = new LikedChallengeNotification(['recipient_id' => $user->id, 'sender_id' => $user->id, 'unread' => 1,
                                'type' => Notification::TYPE_XP, 'parameters' => $challenge->title, 'reference_id' => $challenge->uuid]);
                            $notificationManager->add($notification);

                        }
                    }
                }
            });
            echo "challengesIds:".json_encode($challengesIds);
            Challenge::whereIn('id', $challengesIds)
                ->update([
                    'judged' => true
                ]);


            Challenge::where('closed', '=', 0)->chunk(100, function ($ongoingChallenges) use ($now) {
                foreach ($ongoingChallenges as $challenge) {
                    //
                    $deadLine = new DateTime($challenge->deadLine);
                    $isValid = $now < $deadLine;

                    if (!$isValid) {
                        //we end challenge
                        $challenge->closed = true;
                        $challenge->save();
                    }
                }
            });

        }catch (\Exception $ex){
            Log::info('Exception catch');
            Log::info('Exception '. $ex->getMessage());
        }

            //$this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
    }
}
