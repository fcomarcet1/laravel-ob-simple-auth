<?php

namespace App\Listeners;

use App\Models\UserHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Session;

class UserUpdatedListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $loggedUser = Session::get('user');
        $userId = $loggedUser->id;
        $data = $event->getData();

        UserHistory::create([
             'user_id' => $data->id,
             'modified_by' => $userId,
              'action' => 'updated',
        ]);
    }
}
