<?php

namespace App\Listeners;

use App\Events\SaveAuthorOnCreatedPostEvent;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;


class SaveAuthorOnCreatedPostListener
{

    public function __construct() {
        //
    }

    public function handle(SaveAuthorOnCreatedPostEvent $event)
    {
        \Log::debug('SaveAuthorOnCreatedPostListener launched: ' /*. $event->getData(*/);

        $post = $event->getData();
        $post->user_id = 555;
        //$post->save();
    }
}
