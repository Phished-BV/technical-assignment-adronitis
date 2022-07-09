<?php

namespace Phished\Deliveroo\Database\Factories;
 
use Illuminate\Support\Str;
use Phished\Deliveroo\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
 
class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'house_number' => $this->faker->buildingNumber(),
            'street' => $this->faker->streetName(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postCode(),
            'country' => $this->faker->country(),
            'phone' => $this->faker->randomNumber(),
        ];
    }
}
