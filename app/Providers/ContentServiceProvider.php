<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('admin_asset_path',asset("").'admin/');
        View::share('frontend_asset_path',asset("").'frontend/');
        View::share('image_asset_path',asset(""));
        $controller = new Controller;
        $settings = $controller->mapedSettings;
        $settings['themeData'] = $controller->themeData;
        $settings['socialLinks'] = $controller->socialIcons;
        $settings['menues'] = $controller->menues;
        View::share('globalSettings',$settings);
    }
}
