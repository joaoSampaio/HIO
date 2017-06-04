<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
         Commands\EndChallenge::class,
        Commands\RemindUser::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('end_approve_challenge_dois')
             ->everyTenMinutes();
//        ->everyMinute();

        $schedule->command('remind_user_1')
            ->twiceDaily(1, 13);
        $schedule->command('remind_user_1')
            ->twiceDaily(8, 20);
    }
}
