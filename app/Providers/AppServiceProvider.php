<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\category;
use App\Models\Dish;
use App\Models\order;

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
        
        View::composer('User.include.Banner', function($view)
        {
            $view->with('categories',Category::where('category_status', 1) -> get());
        });


        View::composer('User.include.Dish', function($view)
        {

            $view->with('categories',Category::where('category_status', 1) ->get());

        });

         View::composer('User.include.Dish', function($view)
        {

            $view->with('dishes',Dish::where('dish_status', 1) ->get());

        });


       

        // View::composer('Admin.include.sidebar', function($view)
        // {

        //     $view->with('pending_orders',Order::where('order_status','pending')->count());

        // });
    }

}
