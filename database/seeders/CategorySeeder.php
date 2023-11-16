<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Adjust the number in the create() method based on how many records you want to generate.
        Category::factory()->count(35)->create();
    }
}
