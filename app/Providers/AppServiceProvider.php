<?php

namespace App\Providers;

use App\Post;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;
use App;
use App\Billing\Stripe;
use App\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view) {
            $archives = Post::archives();
            $tags = Tag::has('posts')->pluck('name');
            
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
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }

        App::bind(Stripe::class, function () {
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
