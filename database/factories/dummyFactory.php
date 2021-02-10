<?php

namespace Database\Factories;

use App\Models\dummy;
use Illuminate\Database\Eloquent\Factories\Factory;

class dummyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = dummy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name
        ];
    }
}
