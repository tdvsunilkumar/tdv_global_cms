<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\PageObserver;
use App\Admin\Page;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Page::observe(PageObserver::class);
    }
}
