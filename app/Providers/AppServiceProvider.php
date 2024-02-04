<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Contact;

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
        view()->composer('admin.*', function ($view){
            $readMessages = Contact::where('read', 0)->get();
            $readMessageCount = $readMessages->count();
            $view->with('readMessageCount', $readMessageCount)
                 ->with('readMessages', $readMessages);
        });
    }
}
