<?php

declare(strict_types=1);

namespace Phished\Deliveroo\Providers;

use Illuminate\Support\ServiceProvider;
use Phished\Deliveroo\Services\OrderService;
use Phished\Deliveroo\Repositories\OrderRepository;
use Phished\Deliveroo\Contracts\OrderServiceInterface;
use Phished\Deliveroo\Contracts\OrderRepositoryInterface;

class OrderServiceProvider extends ServiceProvider
{
    public $bindings = [
        OrderRepositoryInterface::class  => OrderRepository::class,
        OrderServiceInterface::class     => OrderService::class,
    ];

    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'deliveroo'); 
    }
}
