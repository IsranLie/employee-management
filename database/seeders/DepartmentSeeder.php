<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = ['Operational', 'Produksi', 'HR', 'Warehouse', 'GA'];

        foreach ($departments as $dept) {
            Department::create(['name' => $dept]);
        }
    }
}
