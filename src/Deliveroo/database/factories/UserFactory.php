<?php

namespace Phished\Deliveroo\Database\Factories;
 
use Illuminate\Support\Str;
use Phished\Deliveroo\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
 
class UserFactory extends Factory
{
    protected $model= User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'password' => bcrypt('secret'),
        ];
    }
}
