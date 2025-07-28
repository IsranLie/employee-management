<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $title = 'Departments';
        $departments = Department::active()->get();

        return view(
            'master.department',
            compact('title', 'departments')
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try {
            $department = Department::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data Department berhasil ditambahkan!',
                'department' => $department
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan data department: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, Department $department)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try {
            $department->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data Department berhasil diperbarui!',
                'department' => $department
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data department: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $department = Department::findOrFail($id);
            $department->softDelete();

            return response()->json([
                'success' => true,
                'message' => 'Data Department berhasil dihapus!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data department: ' . $e->getMessage()
            ], 500);
        }
    }
}
