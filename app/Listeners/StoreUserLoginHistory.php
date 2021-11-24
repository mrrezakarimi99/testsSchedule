<?php

namespace App\Listeners;

use App\Events\LoginAttempt;
use App\Notifications\loginNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StoreUserLoginHistory
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
     * @param LoginAttempt $event
     * @return Model
     */
    public function handle(LoginAttempt $event): Model
    {
        $user = $event->user;
        $delay = now()->addMinutes(4);
        $user->notify((new loginNotification($user->email))->delay($delay));
        return $user->histories()->create([
            'login_at' => Carbon::now()->toDateTimeString(),
            'ip' => $event->request->ip()
        ]);
    }
}
