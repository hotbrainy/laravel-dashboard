<?php

namespace App\Listeners;

use App\Events\ArticleWasSubmitted;
use App\Notifications\UserArticleSubmitted;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class UserArticleSubmissionConfirmation
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
     * @param  ArticleWasSubmitted  $event
     * @return void
     */
    public function handle(ArticleWasSubmitted $event)
    {
        //
        $user = User::find(Auth::id());
        $user->notify(new UserArticleSubmitted($event->user,$event->article,$event->is_Admin));
    }
}
