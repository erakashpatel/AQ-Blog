<?php

namespace AQ_Blog\Providers;

use AQ_Blog\Events\TrackLastActivity;
use AQ_Blog\Events\TrackLogin;
use AQ_Blog\Events\TrackLogout;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            TrackLastActivity::class
        ],

        Login::class => [
            TrackLastActivity::class
        ],

        Logout::class => [
            TrackLastActivity::class
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
