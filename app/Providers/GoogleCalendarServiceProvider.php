<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Google\Client as GoogleClient;
use Google\Service\Apigee\GoogleTypeExpr;

class GoogleCalendarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(GoogleClient::class, function ($app) {
            $client = new GoogleClient();
            // $client->setAuthConfig('path/to/your/credentials.json');
            $client->setAuthConfig(config('google.credentials_path'));
            // $client->setScopes( Google_Service_Calendar::CALENDAR);
            $client->setAccessType("offline");
            $client->setPrompt('select_account consent');
            $client->setScopes([
                'https://www.googleapis.com/auth/calendar',
                'https://www.googleapis.com/auth/calendar.events',
            ]);
            return $client;
        });
    }
}
