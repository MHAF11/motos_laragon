<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motos;
class MotosController extends Controller
{
    public function index()
    {
        $motos = Motos::where('activo', 1)->get();
        return response()->json($motos);
    }
    public function show($id)
    {
        $moto = Motos::where( 'id', $id)->where('activo', 1)->first();
        if ($moto)return response()->json($moto);
        else return response()->json(['error' => 'Moto no encontrado'], 404);
    }

    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $data = $request->validate([
            "nombre" => "required|string",
            "fecha" => "required|date",
            "pais_id" => "required|integer",
            "precio" => "required|numeric",
            "activo" => "boolean|default:1"
        ]);
    
        // Crear una nueva moto
        $moto = Motos::create([
            "nombre" => $data["nombre"],
            "fecha" => $data["fecha"],
            "pais_id" => $data["pais_id"],
            "precio" => $data["precio"],
            "activo" => 1  // Se establece como activo por defecto
        ]);
    
        // Responder con un mensaje de éxito
        if ($moto) {
            return response()->json([
                'mensaje' => 'Moto creada con éxito',
                'data' => $moto
            ], 201); // Código de estado 201 para creación exitosa
        } else {
            return response()->json([
                'error' => 'Error al crear la moto'
            ], 500); // Código de estado 500 si hubo un error al guardar
        }
    }

    public function edit(Request $request, $id)
{
    $moto = Motos::where('activo', '=', 1)->where('id', '=', $id)->first();
        
        if (!$moto) {
            return response()->json(["message" => "Type not found."], 404);
        }
        
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'pais_id' => 'required|integer',
            'precio' => 'required|numeric',
            'activo'=> 'boolean|default:1'
        ]);
        
        $moto->update($data);

        if($moto){
            $object = [
                "code"=>"200",
            ];
            return response()->json([$object, $moto]);
        }
        else{
            $object = [
                "code"=>"404",
            ];
            return response()->json([$object]);
        }
}

public function destroy($id)
{
    // Buscar la moto por ID
    $moto = Motos::find($id);

    if (!$moto) {
        return response()->json([
            'error' => 'Moto no encontrada'
        ], 404); // Si la moto no existe
    }

    // Actualizar el estado de "activo" a 0 (inactiva)
    $moto->update(['activo' => 0]);

    // Responder con un mensaje de éxito
    return response()->json([
        'mensaje' => 'Moto eliminada correctamente',
        'data' => $moto
    ], 200); // Código de estado 200 para éxito
}


}

