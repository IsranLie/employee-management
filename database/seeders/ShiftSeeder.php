<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shifts = ['Shift 1', 'Shift 2', 'Shift 3', 'Non-Shift'];

        foreach ($shifts as $shift) {
            Shift::create(['name' => $shift]);
        }
    }
}
