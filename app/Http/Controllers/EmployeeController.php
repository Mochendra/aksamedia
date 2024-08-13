<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; // Pastikan model Employee sudah ada

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::query();

        // Filter berdasarkan nama jika ada
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        // Filter berdasarkan divisi jika ada
        if ($request->has('division_id')) {
            $query->where('division_id', $request->input('division_id'));
        }

        // Ambil data dengan paginasi
        $employees = $query->paginate(10);

        // Format response
        $response = [
            'status' => 'success',
            'message' => 'Data karyawan berhasil diambil',
            'data' => [
                'employees' => $employees->items(),
                'pagination' => [
                    'total' => $employees->total(),
                    'current_page' => $employees->currentPage(),
                    'last_page' => $employees->lastPage(),
                    'per_page' => $employees->perPage(),
                    'next_page_url' => $employees->nextPageUrl(),
                    'prev_page_url' => $employees->previousPageUrl(),
                ],
            ],
        ];

        return response()->json($response);
    }
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'division' => ['required', 'uuid', Rule::exists('divisions', 'id')],
            'position' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        // Menyimpan foto pegawai
        $imagePath = $request->file('image')->store('images/employees', 'public');

        // Membuat karyawan baru
        $employee = Employee::create([
            'id' => (string) \Str::uuid(),
            'image' => $imagePath,
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'division_id' => $request->input('division'),
            'position' => $request->input('position'),
        ]);

        // Mengembalikan response sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Data karyawan berhasil ditambahkan',
        ], 201);
    }
}
