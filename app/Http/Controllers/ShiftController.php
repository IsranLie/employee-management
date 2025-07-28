<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ShiftController extends Controller
{
    public function index()
    {
        $title = 'Shifts';
        $shifts = Shift::active()->get();

        return view(
            'master.shift',
            compact('title', 'shifts')
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try {
            $shift = Shift::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data Shift berhasil ditambahkan!',
                'shift' => $shift
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan data shift: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, Shift $shift)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try {
            $shift->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data Shift berhasil diperbarui!',
                'shift' => $shift
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data shift: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $shift = Shift::findOrFail($id);
            $shift->softDelete();

            return response()->json([
                'success' => true,
                'message' => 'Data Shift berhasil dihapus!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data shift: ' . $e->getMessage()
            ], 500);
        }
    }
}
