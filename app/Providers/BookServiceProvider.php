<?php

namespace App\Providers;

use App\Interfaces\BookInterface;
use App\Repositories\BookRepository;
use Illuminate\Support\ServiceProvider;

class BookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(
//            'App\Interfaces\BookInterface',
//            'App\Repositories\BookRepository'
//        );
        $this->app->bind(BookInterface::class, BookRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
