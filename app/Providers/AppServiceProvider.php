<?php

namespace App\Providers;

use App\Billing\Stripe;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //wherever sidebar is loaded, it will also load this function
        //1st arg needs to be the name of view that is loaded ex. @include('layouts.sidebar'), next arg, bind something to the view specifically an var named archives, archives will equal to what is returned from \App\Post::archives()
        view()->composer('layouts.sidebar', function($view){
            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');

            $view->with(compact('archives', 'tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Stripe::class, function() {
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
