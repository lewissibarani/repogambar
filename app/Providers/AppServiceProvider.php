<?php

namespace App\Providers;

use App\Models\File;
use Illuminate\Support\ServiceProvider;

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
        
        view()->composer(
            '_layout.nav', 
            function ($view) {
                $cart = Cart::where('user_id', Auth::user()->id);
                $view->with('File', File::all());
            }
        );
    }
}
