<?php

namespace App\Console\Commands;

use App\Model\ChallengeUserAssociation;
use App\Model\FileHio;
use Illuminate\Console\Command;
use DateTime;
use App\Model\User;
use App\Model\Challenge;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Mail;
use Log;
use Carbon\Carbon;

class RemindUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind_user_1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminds Tomas do remind the users';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            Log::info('remind_user called');

            $now = Carbon::now();

            $remindChallenge = array();
            Challenge::where('closed', '=', 0)->where('reminded', '=', 0)->chunk(100, function ($challenges) use ($now, &$remindChallenge) {
                foreach ($challenges as $challenge) {
                    //
                    $deadline = new DateTime($challenge->deadLine);
                    $isValid = $now < $deadline;

                    if ($isValid) {
                        //desafio valido e passar os 50% do deadline

                        $created = new Carbon($challenge->created_at);
                        $deadline = new Carbon($challenge->deadLine);

                        $differenceNow = $created->diffInMinutes($now);
                        $hoursTotal = $created->diffInMinutes($deadline);
                        echo "-----------------------<br>";
                        echo "Challenge:".$challenge->title." now: $differenceNow total: $hoursTotal<br>";
                        echo "percent: ".($differenceNow / $hoursTotal)."<br>";
                        echo "created: $created deadline:$deadline<br>";
                        if(($differenceNow / $hoursTotal) > 0.5){
//                            remind
                            $remindChallenge[] = $challenge->id;
                        }
                    }
                }
            });


            echo "Challenges:".json_encode($remindChallenge)."<br>";

            Challenge::whereIn('id', $remindChallenge)
                ->update([
                    'reminded' => true
                ]);

            $data_email = array();
            DB::table('mail_reminds')
                ->whereIn('challenge_id', $remindChallenge)
                ->chunk(100, function ($reminds) use (&$data_email)  {
                    foreach ($reminds as $remind) {
                        Log::info("--------------------userIdOrEmail--" . json_encode($remind));
                        echo "--------------------userIdOrEmail--" . json_encode($remind) . "<br>";
                        echo "----------++------- $remind->userIdOrEmail<br>";
                        if (str_contains($remind->userIdOrEmail, '@')) {
                            if ($user = User::where('email', $remind->userIdOrEmail)->first()) {
                                echo "--------------------user email---$user->email<br>";
                                //user registou na app
                                if (!ChallengeUserAssociation::where('challenge_id', $remind->challenge_id)->where('user_id', $user->id)->first()) {

                                    //user nao aceitou desafio
                                    echo "-----user nao aceitou desafio1<br>";
                                    Log::info("-----user nao aceitou desafio1");
                                    $data_email[] = array(
                                        'email' => $remind->userIdOrEmail,
                                        'link' => 'https://hiolegends.com/challenge/' . $remind->uuid,
                                        'date' => $remind->created_at,
                                        'name' => $user->name

                                    );

                                }
                            } else {
                                Log::info("-----email-nao registou--$user->email");
                                echo "--------------------email-nao registou--$user->email<br>";
                                //user nao registou na app, logo nao aceitou desafio
                                $data_email[] = array(
                                    'email' => $remind->userIdOrEmail,
                                    'link' => 'https://hiolegends.com/challenge/'.$remind->uuid,
                                    'date' => $remind->created_at,
                                    'name' => ''

                                );
                            }
                        } else if (is_numeric($remind->userIdOrEmail)) {
                            echo "--------------------id---$remind->userIdOrEmail<br>";
                            if (!ChallengeUserAssociation::where('challenge_id', $remind->challenge_id)->where('user_id', $remind->userIdOrEmail)->first()) {

                                //user nao aceitou desafio
                                echo "-----user nao aceitou desafio<br>";
                                if ($user = User::where('id', $remind->userIdOrEmail)->first()) {

                                    $data_email[] = array(
                                        'email' => $user->email,
                                        'link' => 'https://hiolegends.com/challenge/'.$remind->uuid,
                                        'date' => $remind->created_at,
                                        'name' => $user->name

                                    );
                                }
                            }
                        }
                    }
                });



//        echo "data:".json_encode($data_email)."<br>";
            if(count($data_email) > 0){
                Log::info("data:".json_encode($data_email));
                echo "data:".json_encode($data_email)."<br>";
                Mail::queueOn('emails', 'mail.emailRemind', ['data_email' => $data_email],
                    function ($m) use ($data_email) {
                        $emails = ['joaosampaio30@gmail.com', 'targfonseca@gmail.com'];
                        $m->from('hio@hiolegends.com', 'HIO');

                        $m->to( $emails)->subject("Remind users");
                    });

//            'targfonseca@gmail.com',
            }



        }catch (\Exception $ex){
            Log::info('Exception catch');
            Log::info('Exception '. $ex->getMessage());
        }

            //$this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
    }
}
