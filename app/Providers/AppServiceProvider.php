<?php

namespace App\Providers;

use App\Models\Sponsorship;
use Illuminate\Support\Facades\View;
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
        View::share('newCount', Sponsorship::where('states', 'New')->count());
        View::share('approvedCount', Sponsorship::where('states', 'Approved')->count());
        View::share('agreedCount', Sponsorship::where('states', 'Agreed')->count());
        View::share('preTaskCount', Sponsorship::where('states', 'Pre Task')->count());
        View::share('collectionCount', Sponsorship::where('states', 'Collection')->count());
        View::share('postEventsCount', Sponsorship::where('states', 'Post Events')->count());
        View::share('completedCount', Sponsorship::where('states', 'Completed')->count());
        View::share('rejectedCount', Sponsorship::where('states', 'Rejected')->count());
    }
}
