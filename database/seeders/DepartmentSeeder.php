<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

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
