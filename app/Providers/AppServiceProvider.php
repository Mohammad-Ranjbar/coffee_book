<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use function foo\func;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
	    Schema::defaultStringLength(191);
	    View::composer('*', function($view) {
		    $view->with('channels', \App\models\Channel::all());
	    });
    }
}
