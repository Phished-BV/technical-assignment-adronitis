<?php

declare(strict_types=1);

namespace Phished\Deliveroo\Services;

use Phished\Deliveroo\Models\Order;
use Illuminate\Support\Facades\Mail;
use Phished\Deliveroo\Transports\EmailTransport;
use Phished\Deliveroo\Contracts\OrderServiceInterface;

class OrderService implements OrderServiceInterface
{
    public function reply(Order $order, string $message): void
    {
        Mail::to([$order->user->email])->send(new EmailTransport($order, $message));
    }
}
