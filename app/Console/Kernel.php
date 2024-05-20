<?php

namespace App\Console;

use App\Models\Admin;
use App\Models\Seller;
use App\Notifications\ApiKeyExpireNotification;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        //schedule daily email to admins and sellers table for valid_till date less than 7 days and is_autoextended = 0
        $schedule->call(function () {
            $admins = Admin::where('valid_till', '<', Carbon::now()->addDays(7))->where('is_autoextended', 0)->get();
            foreach ($admins as $admin) {
                $admin->notify(new ApiKeyExpireNotification($admin));
            }
            $sellers = Seller::where('valid_till', '<', Carbon::now()->addDays(7))->where('is_autoextended', 0)->get();
            foreach ($sellers as $seller) {
                $seller->notify(new ApiKeyExpireNotification($seller));
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
