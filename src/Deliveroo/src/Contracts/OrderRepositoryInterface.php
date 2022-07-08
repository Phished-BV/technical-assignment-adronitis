<?php

declare(strict_types=1);

namespace Phished\Deliveroo\Contracts;

use Phished\Deliveroo\Models\Order;
use Phished\Deliveroo\DTO\CreateOrderDTO;
use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryInterface
{
    public function createOrder(CreateOrderDTO $createOrderDTO): Order;
    public function allOrders(): Collection;
    public function detail(int $orderId): Order;
}
