<?php

declare(strict_types=1);

namespace Phished\Deliveroo\DTO\CreateOrderDTO;

use Phished\Deliveroo\UI\Requests\CreateOrderRequest;

class CreateOrderDTO
{
    public function __construct(
        public readonly int         $userId,
        public readonly array       $orderItems,
        public readonly string      $houseNumber,
        public readonly string      $houseNumberAddition,
        public readonly string      $street,
        public readonly string      $city,
        public readonly string      $postalCode,
        public readonly string      $country,
        public readonly string      $phone,
        public readonly int         $subTotal,
        public readonly int         $deliveryCost,
        public readonly int         $total,
    ) {
    }

    public static function fromRequest(CreateOrderRequest $request): static
    {
        $validated = $request->safe();

        foreach($validated->orderItems as $item){
            $items = [
                'orderId' => $item->orderId,
                'item' => $item->item,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ];
        }

        return new self(
            userId: $validated->userID,
            orderItems: $items,
            houseNumber: $validated->houseNumber,
            houseNumberAddition: $validated->houseNumberAddition,
            street: $validated->street,
            city: $validated->city,
            postalCode: $validated->postalCode,
            country: $validated->country,
            phone: $validated->phone,
        );
    }
}
