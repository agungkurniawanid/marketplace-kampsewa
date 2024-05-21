<?php

namespace App\Console;

use App\Models\DetailIklan;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            DetailIklan::where('tanggal_mulai', date('Y-m-d'))->update(['status_iklan' => 'aktif']);
            DetailIklan::where('tanggal_akhir', '<', date('Y-m-d'))->update(['status_iklan' => 'selesai']);
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
