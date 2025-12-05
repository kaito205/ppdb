<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if($this->app->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        \Illuminate\Pagination\Paginator::useBootstrapFive();

        \Illuminate\Support\Facades\View::composer('layouts.navbar', function ($view) {
            $messages = \App\Models\Contact::latest()->take(5)->get();
            $count = \App\Models\Contact::count();
            $view->with('navbarMessages', $messages)->with('navbarMessagesCount', $count);
        });
    }
}
