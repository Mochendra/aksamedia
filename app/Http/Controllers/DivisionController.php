<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    public function index(Request $request)
    {
        $query = Division::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $divisions = $query->paginate(10);

        return response()->json([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'divisions' => $divisions->items(),
            ],
            'pagination' => [
                'current_page' => $divisions->currentPage(),
                'per_page' => $divisions->perPage(),
                'total' => $divisions->total(),
                'last_page' => $divisions->lastPage(),
            ],
        ]);
    }
}

