<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view(
            'auth.index',
            ['title' => 'Login']
        );
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = User::active()->with(['employee.department', 'employee.shift'])
                ->where('username', Auth::user()->username)
                ->first();

            if ($user && $user->employee) {
                $employee = $user->employee;
                session([
                    'session_username'  => $user->username,
                    'session_created'   => $user->created_at,
                    'session_name' => $employee->name,
                    'session_department' => $employee->department?->name ?? '-',
                    'session_shift'     => $employee->shift?->name ?? '-',
                ]);
            }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
