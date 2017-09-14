<?php

namespace App\Providers;

use App\Billing\Stripe;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes
         Schema::defaultStringLength(191);

         view()->composer('posts.index', function($view) {
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
