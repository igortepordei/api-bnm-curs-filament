<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\SyncCurrenciesDataJob;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        // $schedule->job(new \App\Jobs\SyncCurrenciesJob())->dailyAt('00:05');
        // $schedule->job(new \App\Jobs\SyncCurrenciesJob())->hourly();
        $schedule->job(new SyncCurrenciesDataJob())->everyMinute(); //->everyTenMinutes(); //->everyMinute(); //php artisan schedule:work
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
