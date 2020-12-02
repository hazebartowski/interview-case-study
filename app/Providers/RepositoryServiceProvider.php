<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\ProductContract;
use App\Repositories\ProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        ProductContract::class       =>          ProductRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}