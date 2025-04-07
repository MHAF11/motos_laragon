<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marcas;

class MarcasController extends Controller
{
    public function index()
    {
        $marcas = Marcas::where('activo', 1)->get();
        return response()->json($marcas);
    }

    public function show($id)
    {
        $marca = Marcas::where('id', $id)->where('activo', 1)->first();
        if ($marca) {
            return response()->json($marca);
        } else {
            return response()->json(['error' => 'Marca no encontrada'], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "nombre" => "required|string",
            "activo" => "boolean"
        ]);

        $marca = Marcas::create([
            "nombre" => $data["nombre"],
            "activo" => $data["activo"] ?? 1
        ]);

        if ($marca) {
            return response()->json([
                'mensaje' => 'Marca creada con éxito',
                'data' => $marca
            ], 201);
        } else {
            return response()->json([
                'error' => 'Error al crear la marca'
            ], 500);
        }
    }

    public function edit(Request $request, $id)
    {
        $marca = Marcas::where('activo', 1)->where('id', $id)->first();

        if (!$marca) {
            return response()->json(["message" => "Marca no encontrada."], 404);
        }

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'activo' => 'boolean'
        ]);

        $marca->update($data);

        return response()->json([
            "mensaje" => "Marca actualizada correctamente",
            "data" => $marca
        ]);
    }

    public function destroy($id)
    {
        $marca = Marcas::find($id);

        if (!$marca) {
            return response()->json([
                'error' => 'Marca no encontrada'
            ], 404);
        }

        $marca->update(['activo' => 0]);

        return response()->json([
            'mensaje' => 'Marca eliminada correctamente',
            'data' => $marca
        ], 200);
    }
}

