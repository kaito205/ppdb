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
            $messagesCount = \App\Models\Contact::count();
            
            // Alerts for Pending Registrations
            $pendingReg = \App\Models\Pendaftaran::where('verifikasi_dokumen', 'Pending')->latest()->take(5)->get();
            $pendingCount = \App\Models\Pendaftaran::where('verifikasi_dokumen', 'Pending')->count();

            $view->with('navbarMessages', $messages)
                 ->with('navbarMessagesCount', $messagesCount)
                 ->with('navbarAlerts', $pendingReg)
                 ->with('navbarAlertsCount', $pendingCount);
        });
    }
}
