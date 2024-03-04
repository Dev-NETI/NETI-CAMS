<?php

namespace Database\Seeders;

use App\Models\unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        unit::truncate();

        $data = [
            1 => ["pc","piece"],
            2 => ["dz","dozen"],
            3 => ["cs","case"],
            4 => ["bx","box"],
            5 => ["lb","pound"],
            6 => ["kg","kilogram"],
            7 => ["oz","ounce"],
            8 => ["g","gram"],
            9 => ["l","liter"],
            10 => ["gal","gallon"],
            11 => ["sf","square foot"],
            12 => ["sqm","square meter"],
            13 => ["roll","roll"],
            14 => ["cf","cubic foot"],
            15 => ["cm","cubic meter"],
            16 => ["pr","pair"],
        ];

        foreach ($data as $index => [$name, $description]) {
            unit::create([
                'name' => $name,
                'description' => $description,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
