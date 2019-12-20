<?php

namespace App\Providers;

use App\Category;
use App\Observers\CategoryObserver;
use Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;

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

        Category::observe(CategoryObserver::class);



        View::composer(['frontend.welcome', 'frontend.element.footer'], function ($view){

            $categories = Cache::rememberForever('categories', function (){
                return Category::latest()->take(12)->get();
            });

            $view->with('categories', $categories);
        });
    }
}
