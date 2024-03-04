<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Roles::truncate();

        $data = [
            1 => ["Inventory Module"],
            2 => ["Logs Module"],
            3 => ["Replenishment Logs (Logs Module)"],
            4 => ["Consumption Logs (Logs Module)"],
            5 => ["Settings Module"],
            6 => ["Categories (Settings Module)"],
            7 => ["Department (Settings Module)"],
            8 => ["Supplier (Settings Module)"],
            9 => ["Unit (Settings Module)"],
            10 => ["User Management Module"],
        ];

        foreach($data as $index=>[$name]){
                Roles::create([
                    'name' => $name,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
        }

    }
}
