<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shift;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $users = User::active()->count();
        $employees = Employee::active()->count();
        $departments = Department::active()->count();
        $shifts = Shift::active()->count();

        return view(
            'home.home',
            compact(['title', 'users', 'employees', 'departments', 'shifts'])
        );
    }
}
