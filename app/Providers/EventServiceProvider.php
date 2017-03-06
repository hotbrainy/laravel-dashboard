<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\ArticleWasSubmitted' => [
            'App\Listeners\UserArticleSubmissionConfirmation',
        ],
        'App\Events\ArticleWasApproved' => [
            'App\Listeners\ArticleApprovelNotificationToUser',
        ],
        'App\Events\ArticleWasUsed' => [
            'App\Listeners\ArticleUsedNotification',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
