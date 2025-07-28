<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $title = 'Employees';
        $employees = Employee::active()->with(['department', 'shift'])->get();

        return view(
            'master.employee',
            compact('title', 'employees')
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:16|unique:employees',
            'name' => 'required|string|max:255',
            'department_id' => 'required|integer',
            'shift_id' => 'required|integer',
        ]);

        try {
            $employee = Employee::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data employee berhasil ditambahkan!',
                'employee' => $employee
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan data employee: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:16|unique:employees',
            'name' => 'required|string|max:255',
            'department_id' => 'required|integer',
            'shift_id' => 'required|integer',
        ]);

        try {
            $employee->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data employee berhasil diperbarui!',
                'employee' => $employee
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data employee: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->softDelete();

            return response()->json([
                'success' => true,
                'message' => 'Data employee berhasil dihapus!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data employee: ' . $e->getMessage()
            ], 500);
        }
    }
}
