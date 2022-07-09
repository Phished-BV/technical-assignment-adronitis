<?php

declare(strict_types=1);

namespace Phished\Deliveroo\Tests\Feature;

use Phished\Deliveroo\Models\User;
use Phished\Deliveroo\Models\Order;
use Illuminate\Support\Facades\Mail;
use Phished\Deliveroo\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class CanAcceptOrder extends TestCase
{
    use WithFaker;

    /** @test */
    public function can_accept_order()
    {
        $route = route('order.create');
        $user = User::factory()->create();
        $data = $this->orderData($user);
      
        $response = $this->postJson($route, $data);

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'street'  => $data['street'],
            'total'   => $data['total'],
        ]);
    }

    private function orderData(User $user): array
    {
        return [
            'email'                 => config('order.allow_orders_from_email'),
            'userId'                => $user->id,
            'street'                => $this->faker->streetName,
            'houseNumber'           => $this->faker->buildingNumber,
            'houseNumberAddition'   => $this->faker->randomLetter(),
            'postalCode'            => $this->faker->postcode,
            'city'                  => $this->faker->city,
            'country'               => $this->faker->country,
            'phone'                 => (string) $this->faker->randomNumber(),
            'orderItems'            => [
                [
                    'item'          => $this->faker->word,
                    'quantity'      => $this->faker->randomNumber(1),
                    'price'         => $this->faker->randomNumber(5),
                ]
            ],
            'deliveryCost'          => $this->faker->randomNumber(5),
            'subTotal'              => $this->faker->randomNumber(5),
            'total'                 => $this->faker->randomNumber(5),
        ];
    }
}
