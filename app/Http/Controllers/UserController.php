<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Users';
        $users = User::active()->get();
        $employees = Employee::active()->get();

        return view(
            'master.user',
            compact('title', 'users', 'employees')
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|integer|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:5',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        try {
            $user = User::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data Pengguna berhasil ditambahkan!',
                'user' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan data pengguna: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);

        try {
            if (isset($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            } else {
                unset($validatedData['password']);
            }

            $user->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data Pengguna berhasil diperbarui!',
                'user' => $user
            ], 201);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data pengguna: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Pengguna berhasil dihapus!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data pengguna: ' . $e->getMessage()
            ], 500);
        }
    }
}
