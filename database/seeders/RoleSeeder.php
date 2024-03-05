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
            11 => ["Create Inventory (Inventory Module)"],
            12 => ["Edit Inventory (Inventory Module)"],
            13 => ["Consume Inventory (Inventory Module)"],
            14 => ["Replenish Inventory (Inventory Module)"],
            15 => ["Create Categories (Categories Settings)"],
            16 => ["Edit Categories (Categories Settings)"],
            17 => ["Delete Categories (Categories Settings)"],
            18 => ["Create Supplier (Supplier Settings)"],
            19 => ["Edit Supplier (Supplier Settings)"],
            20 => ["Delete Supplier (Supplier Settings)"],
            21 => ["Create Unit (Unit Settings)"],
            22 => ["Edit Unit (Unit Settings)"],
            23 => ["Delete Unit (Unit Settings)"],
            24 => ["Create User (User Management)"],
            25 => ["Change Password (User Management)"],
            26 => ["Assign Roles (User Management)"],
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
