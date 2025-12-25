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

        \Illuminate\Support\Facades\View::composer(['layouts.navbar', 'layouts.sidebar', 'admin.dashboard'], function ($view) {
            $messages = \App\Models\Contact::latest()->take(5)->get();
            $messagesCount = \App\Models\Contact::where('is_read', false)->count();
            
            // Alerts for Pending Registrations
            $pendingReg = \App\Models\Pendaftaran::where('is_read', false)->latest()->take(5)->get();
            $pendingCount = \App\Models\Pendaftaran::where('is_read', false)->count();

            $view->with('navbarMessages', $messages)
                 ->with('unreadMessagesCount', $messagesCount)
                 ->with('navbarAlerts', $pendingReg)
                 ->with('navbarAlertsCount', $pendingCount);
        });
    }
}
