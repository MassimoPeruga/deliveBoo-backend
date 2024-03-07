<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all()->map(function ($type) {
            // Aggiungi il percorso dell'immagine all'oggetto Type
            $type->image_url = asset('/storage/' . $type->image); // Assicurati che il percorso sia corretto

            return $type;
        });
        return response()->json([
            'success' => true,
            'results' => $types
        ]);
    }
}
