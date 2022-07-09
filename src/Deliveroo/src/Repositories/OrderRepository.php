<?php

declare(strict_types=1);

namespace Phished\Deliveroo\Repositories;

use Phished\Deliveroo\DTO\CreateOrderDTO;
use Phished\Deliveroo\Enums\OrderStatus;
use Phished\Deliveroo\Models\Order;
use Phished\Deliveroo\Models\OrderItem;
use Illuminate\Database\Eloquent\Collection;
use Phished\Deliveroo\Contracts\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function createOrder(CreateOrderDTO $orderDTO): Order
    {
        $order = Order::create([
            'user_id'                   => $orderDTO->userId,
            'status'                    => OrderStatus::Pending,
            'house_number'              => $orderDTO->houseNumber,
            'house_number_addition'     => $orderDTO->houseNumberAddition,
            'street'                    => $orderDTO->street,
            'city'                      => $orderDTO->city,
            'country'                   => $orderDTO->country,
            'postal_code'               => $orderDTO->postalCode,
            'phone'                     => $orderDTO->phone,
            'delivery_cost'             => $orderDTO->deliveryCost,
            'sub_total'                 => $orderDTO->subTotal,
            'total'                     => $orderDTO->total,
        ]);

        foreach($orderDTO->orderItems as $item){
            OrderItem::create([
                'order_id'   => $order->id,
                'item'       => $item['name'],
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
            ]);
        }

        $order = $order->fresh();

        return $order;
    }

    public function allOrders(): Collection
    {
        return Order::query()->get();
    }

    public function detail(int $orderId): Order
    {
        return Order::query()->find($orderId);
    }
}
