<?php

namespace App\Console\Commands;

use App\Model\FileHio;
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
            Log::info('end_approve_challenge called');
            Challenge::where('judged', '=', 0)->chunk(100, function ($challenges) use ($now) {
                foreach ($challenges as $challenge) {

                    $idsUserCompletedChallenge = [];
                    $deadLine = Carbon::parse($challenge->deadLine);
                    $deadLine = $deadLine->addHours(36);
                    $isValid = $now < $deadLine;
                    if (!$isValid) {
                        //validar provas e judgments

//                        $sonChallengesIds = DB::table('files')->where('files.challenge_id', $challenge->id)
//                            ->join('proof_approval', 'proof_approval.proof_id', '=', 'files.id')
//                            ->where('proof_approval.judgment', '=', '1')
//                            ->select('files.id', DB::raw('SUM(judgment) as total_judgment'))
//                            ->groupBy('files.id')
//                            ->havingRaw('SUM(judgment) > 0')
//                            ->lists('files.id');


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





                        FileHio::whereIn('id', $sonChallengesIds)
                            ->update([
                                'approved' => true
                            ]);

//                    $sonChallengesIds = DB::table('files')->whereIn('id',$sonChallengesIds)
//                        ->select('files.user_id')
//                        ->groupBy('files.user_id')
//                        ->lists('files.user_id');


                        $challenge->judged = true;
                        $challenge->save();

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
                            $user->save();
                        }
                    }
                }
            });


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
