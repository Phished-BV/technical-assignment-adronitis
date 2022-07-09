<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Phished\Deliveroo\UI\Controllers\CreateOrderHttpController;

Route::group([
    'middleware' => 'api',
    'prefix'     => 'orders',
], function () {
    Route::post('/', CreateOrderHttpController::class)->name('order.create');
});
