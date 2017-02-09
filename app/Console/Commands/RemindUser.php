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
    protected $signature = 'remind_user';

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
            $now = Carbon::now();
            Log::info('remind_user called');

            $remindChallenge = array();
            Challenge::where('closed', '=', 0)->where('reminded', '=', 0)->chunk(100, function ($challenges) use ($now) {
                foreach ($challenges as $challenge) {
                    //
                    $deadLine = new DateTime($challenge->deadLine);
                    $isValid = $now < $deadLine;

                    if ($isValid) {
                        //desafio valido e passar os 50% do deadline

                        $created = new Carbon($challenge->created_at);
                        $deadline= new Carbon($challenge->deadline);
                        $differenceNow = $created->diffInHours($now);
                        $hoursTotal = $created->diffInHours($deadline);

                        if($differenceNow / $hoursTotal > 0.5){
//                            remind
                            $remindChallenge[] = $challenge->id;

                        }
                    }
                }
            });

//            Challenge::whereIn('id', $remindChallenge)
//                ->update([
//                    'reminded' => true
//                ]);

            $data_email = array();
            DB::table('mail_reminds')
                ->whereIn('challenge_id', $remindChallenge)
                ->chunk(100, function ($remind)  {

                    if (str_contains($remind->userIdOrEmail, '@')) {
                        if ($user = User::where('email', $remind->userIdOrEmail)->first()) {

                            //user registou na app
                            if (!ChallengeUserAssociation::where('challenge_id', $remind->challenge_id)->where('user_id', $user->id)->first()) {

                                //user nao aceitou desafio


                                $data_email[] = array(
                                    'email' => $remind->userIdOrEmail,
                                    'link' => 'https://hiolegends.com/challenges/$remind->challenge_id',
                                    'date' => $remind->created_at,
                                    'name' => $user->name

                                );


                            } else {

                                //user nao registou na app, logo nao aceitou desafio
                                $data_email[] = array(
                                    'email' => $remind->userIdOrEmail,
                                    'link' => 'https://hiolegends.com/challenges/$remind->challenge_id',
                                    'date' => $remind->created_at,
                                    'name' => ''

                                );
                            }
                        }
                    } else if (is_numeric($remind->userIdOrEmail)) {
                        if (!ChallengeUserAssociation::where('challenge_id', $remind->challenge_id)->where('user_id', $remind->userIdOrEmail)->first()) {

                            //user nao aceitou desafio

                            if ($user = User::where('email', $remind->userIdOrEmail)->first()) {

                                $data_email[] = array(
                                    'email' => $user->email,
                                    'link' => 'https://hiolegends.com/challenges/$remind->challenge_id',
                                    'date' => $remind->created_at,
                                    'name' => $user->name

                                );
                            }
                        }
                    }
                });



            if(count($data_email) > 0){
                Mail::queueOn('emails', 'mail.emailRemind', ['data_email' => $data_email],
                    function ($m) use ($data_email) {
                        $m->from('noreply@hiolegends.com', 'HIO');

                        $m->to('targfonseca@gmail.com', 'joaosampaio30@gmail.com')->subject("Remind users");
                    });

            }



        }catch (\Exception $ex){
            Log::info('Exception catch');
            Log::info('Exception '. $ex->getMessage());
        }

            //$this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
    }
}
