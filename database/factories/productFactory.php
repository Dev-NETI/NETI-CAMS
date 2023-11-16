<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Item '.$this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(1 , 5000),
            'quantity' => $this->faker->numberBetween(1, 300),
            'unit_id' =>  $this->faker->numberBetween(1, 16),
            'manufacturer' => $this->faker->company,
            'department_id' =>  $this->faker->numberBetween(1, 7),
            'category_id' =>  $this->faker->numberBetween(1, 35),
            'supplier_id' =>  $this->faker->numberBetween(1, 35),
            'created_at' => now(),
            'updated_at' => now(),
            'LastModifiedBy' => $this->faker->name,
            'low_stock_level' => $this->faker->numberBetween(1 , 20),
        ];
    }
}
