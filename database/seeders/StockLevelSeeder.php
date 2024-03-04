<?php

namespace Database\Seeders;

use App\Models\Stock_level;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StockLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Stock_level::truncate();

        $data = [
            1 => ["Low Stock"],
            2 => ["On Stock"],
        ];

        foreach ($data as $index => [$name]) {
            Stock_level::create([
                'stock_level' => $name,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
