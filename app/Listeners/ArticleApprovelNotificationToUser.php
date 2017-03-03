<?php

namespace App\Listeners;

use App\Events\ArticleWasApproved;
use App\Notifications\ArticleHasApproved;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class ArticleApprovelNotificationToUser
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
     * @param  ArticleWasApproved  $event
     * @return void
     */
    public function handle(ArticleWasApproved $event)
    {
        //
       $user = User::find($event->article->user_id);
        $user->notify(new ArticleHasApproved($event->user,$event->article,$event->is_Admin));
    }
}
