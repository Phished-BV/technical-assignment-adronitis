<?php

namespace Phished\Deliveroo\Database\Factories;
 
use Illuminate\Support\Str;
use Phished\Deliveroo\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;
 
class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item'          => $this->faker->word,
            'quantity'      => $this->faker->randomNumber(1),
            'price'         => $this->faker->randomNumber(5),
        ];
    }
}
