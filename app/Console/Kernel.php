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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) // список исполняемых команд
    {
        // $schedule->command('inspire')
        //          ->hourly();

        //$schedule->command('user:create')->everyMinute(); // выполнение команды добавление пользователя

        //$schedule->command('fetch:price 1')->everyThirtyMinutes();
        $schedule->command('fetch:price 1')->everyFifteenMinutes();
        //$schedule->command('fetch:price 1')->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
