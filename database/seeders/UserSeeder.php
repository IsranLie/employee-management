<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Shift;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = Employee::where('name', 'Ahmad Mubarok')->first()->id;

        User::create([
            'id' => Str::uuid(),
            'employee_id' => $employee,
            'username' => 'ahmad',
            'password' => Hash::make('ahmad')
        ]);
    }
}
