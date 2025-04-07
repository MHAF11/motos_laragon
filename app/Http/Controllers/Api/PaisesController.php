<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paises;

class PaisesController extends Controller
{
    public function index()
    {
        $paises = Paises::where('activo', 1)->get();
        return response()->json($paises);
    }

    public function show($id)
    {
        $pais = Paises::where('id', $id)->where('activo', 1)->first();

        if ($pais) {
            return response()->json($pais);
        } else {
            return response()->json(['error' => 'País no encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'activo' => 'boolean'
        ]);

        $pais = Paises::create([
            'nombre' => $data['nombre'],
            'activo' => $data['activo'] ?? 1
        ]);

        if ($pais) {
            return response()->json([
                'mensaje' => 'País creado con éxito',
                'data' => $pais
            ], 201);
        } else {
            return response()->json([
                'error' => 'Error al crear el país'
            ], 500);
        }
    }

    public function edit(Request $request, $id)
    {
        $pais = Paises::where('activo', 1)->where('id', $id)->first();

        if (!$pais) {
            return response()->json(["message" => "País no encontrado."], 404);
        }

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'activo' => 'boolean'
        ]);

        $pais->update($data);

        return response()->json([
            'mensaje' => 'País actualizado con éxito',
            'data' => $pais
        ]);
    }

    public function destroy($id)
    {
        $pais = Paises::find($id);

        if (!$pais) {
            return response()->json([
                'error' => 'País no encontrado'
            ], 404);
        }

        $pais->update(['activo' => 0]);

        return response()->json([
            'mensaje' => 'País eliminado correctamente',
            'data' => $pais
        ]);
    }
}
