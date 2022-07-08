<?php

declare(strict_types=1);

namespace Phished\Deliveroo\Contracts;

use Phished\Deliveroo\Models\Order;

interface OrderServiceInterface
{
    public function reply(Order $order, string $message): void;
}
