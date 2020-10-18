<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
//use App\Crop;
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
        
        $this->app->bind('path.card.public', function () {
            if ($_SERVER['REQUEST_URI'] == '127.0.0.1') {
                return base_path() . '/../public_html';
            }
        });

        view()->composer(['layouts.dashboard', 'layouts.partial.topbar'], function ($view) {
            $view->with([
                'user' => Auth::user(),
                //'cropTypes'=> Crop::all(),
                //'regions'=> \App\Region::all()
            ]);
        });
    }
}
