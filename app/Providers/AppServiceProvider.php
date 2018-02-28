<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\categories;
use App\posts;
use App\tag;
use App\subcategories;
use App\modules;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);

         // share date with header
        View::composer('*',function($view)
        {
            $view->with('allcategories',categories::where('status','>',0)->get());
            $view->with('RecentPosts',posts::orderBy('created_at','desc')->skip(3)->take(3)->get());
            $view->with('LatestPost',posts::orderBy('created_at','desc')->take(3)->get());
            $view->with('TopViewPost',posts::where('views','>',0)->orderBy('views','desc')->take(3)->get());
            $view->with('TimelinePost',posts::all()->take(7));
            $view->with('getTag',tag::all()->take(10));
            $view->with('LatestPost',posts::orderBy('created_at','desc')->take(3)->get());
     
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
