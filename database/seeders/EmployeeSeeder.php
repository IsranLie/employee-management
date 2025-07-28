<?php

namespace Database\Seeders;

use App\Models\Shift;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departmentOperational = Department::where('name', 'Operational')->first()->id;
        $departmentProduksi = Department::where('name', 'Produksi')->first()->id;
        $departmentHR = Department::where('name', 'HR')->first()->id;
        $departmentWarehouse = Department::where('name', 'Warehouse')->first()->id;
        $departmentGA = Department::where('name', 'GA')->first()->id;

        $shift1 = Shift::where('name', 'Shift 1')->first()->id;
        $shift2 = Shift::where('name', 'Shift 2')->first()->id;
        $shift3 = Shift::where('name', 'Shift 3')->first()->id;
        $nonShift = Shift::where('name', 'Non-Shift')->first()->id;

        Employee::insert([
            [
                'nik' => '202501',
                'name' => 'Ahmad Mubarok',
                'department_id' =>  $departmentOperational,
                'shift_id' => $shift1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '202502',
                'name' => 'Reno Feninda',
                'department_id' =>  $departmentProduksi,
                'shift_id' => $shift2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '202503',
                'name' => 'Dani Albani',
                'department_id' =>  $departmentHR,
                'shift_id' => $nonShift,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '202504',
                'name' => 'Algifari',
                'department_id' =>  $departmentWarehouse,
                'shift_id' => $shift3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '202505',
                'name' => 'Viana Alfiani',
                'department_id' =>  $departmentGA,
                'shift_id' => $nonShift,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
