<?php

namespace App\Listeners;

use App\Events\CelebrityLoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StoreCelebrityLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CelebrityLoginHistory  $event
     * @return void
     */
    public function handle(CelebrityLoginHistory $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $celebrityinfo = $event->celebrity;

        $saveHistory = DB::table('celebrity_login_history')->insert([
            'celeb_id' => $celebrityinfo->id,
            'name' => $celebrityinfo->name, 
            'email' => $celebrityinfo->email, 
            'created_at' => $current_timestamp, 
            'updated_at' => $current_timestamp
        ]);
        return $saveHistory;
    }
}
