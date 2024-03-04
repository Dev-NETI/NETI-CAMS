<?php

namespace Database\Seeders;

use App\Models\department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        department::truncate();

        $data = [
            1 => ["NOC", "Network Operation Center"],
            2 => ["BOD", "Business Operations Department"],
            3 => ["PRPD", "Planning, Research and Program Development Department"],
            4 => ["FD", "Finance Department"],
            5 => ["Galley", "Galley Department"],
            6 => ["DOD", "Dormitory Department"],
            7 => ["Admin", "Admin Department"],
        ];

        foreach ($data as $index => [$name, $description]) {
            department::create([
                'name' => $name,
                'description' => $description,
                'created_at' => now(),
                'updated_at' => now(),
                'Is_Deleted' => 0
            ]);
        }
    }
}
