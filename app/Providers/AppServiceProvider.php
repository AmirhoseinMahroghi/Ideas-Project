<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use \Debugbar;

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
        Paginator::useBootstrapFive();

        DebugBar::enable();

        $topUsers = cache()->remember('topUsers', now()->addMinutes(5), function () {
            return User::withCount('ideas')->orderBy('ideas_count', 'DESC')->take(10)->get();
        });

        View::share(
            'topUsers',
            $topUsers
        );
    }
}
