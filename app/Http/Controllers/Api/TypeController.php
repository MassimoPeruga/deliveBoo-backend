<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        request()->validate(['key' => ['nullable', 'string']]);
        if (request()->key) {
            $types = Type::where('name', 'LIKE', '%' . request()->key . '%')->get()->map(function ($type) {
                $type->image = asset('/storage/types/' . $type->image);
                return $type;
            });
        } else {
            $types = Type::all()->map(function ($type) {

                $type->image = asset('/storage/types/' . $type->image);
                return $type;
            });
        }
        if ($types) {
            return response()->json([
                'success' => true,
                'results' => $types
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 500,
                'results' => [],
            ]);
        }
    }
}
