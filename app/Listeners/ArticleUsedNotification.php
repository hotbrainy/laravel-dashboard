<?php

namespace App\Listeners;

use App\Events\ArticleWasUsed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Notifications\ArticleHasUsed;
class ArticleUsedNotification
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
     * @param  ArticleWasUsed  $event
     * @return void
     */
    public function handle(ArticleWasUsed $event)
    {
        //
        $user = User::find($event->article->user_id);
        $user->notify(new ArticleHasUsed($event->user,$event->article,$event->is_Admin));
    }
}
