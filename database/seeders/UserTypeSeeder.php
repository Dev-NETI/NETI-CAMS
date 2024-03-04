<?php

namespace Database\Seeders;

use App\Models\User_type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User_type::truncate();

        $data = [
            1 => ["System Administrator"],
            2 => ["Employee"],
        ];

        foreach ($data as $index => [$name]) {
            User_type::create([
                'user_type' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
