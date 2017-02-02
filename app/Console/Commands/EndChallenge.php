<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DateTime;
use App\Model\User;
use App\Model\Challenge;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Inspiring;

class EndChallenge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'endchallenge';

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
        $now = new DateTime();
        Challenge::where('closed', '=', 0)->chunk(100, function($ongoingChallenges) use ($now) {
            foreach ($ongoingChallenges as $challenge) {
                //
                $deadLine = new DateTime($challenge->deadLine);
                $isValid = $now < $deadLine;
                if(!$isValid){
                    echo 'id:' .  $challenge->id .'<br>';
                    //we end challenge
                    $challenge->closed = true;
                    $challenge->save();
                    //verificar se os utilizadores adicionaram proofs e ver achievement

                    $sonChallenges = DB::table('files')->where('files.challenge_id', $challenge->id)
                        ->select('files.user_id', DB::raw('count(*) as total'))
                        ->groupBy('files.user_id')
                        ->get();
                    foreach ($sonChallenges as $sonChallenge) {
                        if ($user = User::where('id', $sonChallenge->user_id)->first()) {
                            $achievements = $user->achievements;
                            if($achievements == NULL){
                                $achievements = array('totalCompleted' => 1);
                            }else{
                                $achievements = json_decode($achievements, true);
                                if (!array_key_exists('totalCompleted', $achievements)) {
                                    $achievements['totalCompleted'] = 1;
                                }else{
                                    $achievements['totalCompleted'] = $achievements['totalCompleted']+1;
                                }
                            }
                            $user->achievements = json_encode($achievements);
                            $user->save();
                        }
                    }

                }

            }
        });


            //$this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
    }
}
