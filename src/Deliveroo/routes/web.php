<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Phished\Deliveroo\UI\Controllers\GetOrdersHttpController;
use Phished\Deliveroo\UI\Controllers\SendReplyOrderHttpController;
use Phished\Deliveroo\UI\Controllers\ViewReplyOrderHttpController;

Route::group([
    'middleware' => 'web',
    'prefix'     => 'orders',
], function () {
    Route::get('/', GetOrdersHttpController::class)->name('order.show');

    Route::get('/{orderId}/reply', ViewReplyOrderHttpController::class)->name('order.viewReply');
    Route::post('/{orderId}/reply', SendReplyOrderHttpController::class)->name('order.sendReply');
});
