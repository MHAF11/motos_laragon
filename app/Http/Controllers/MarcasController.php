<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function index()
    {
        $marcas = Marcas::where('activo', 1)->get();
        return view("marcas.index", compact('marcas'));
    }

    public function create()
    {
        return view("marcas.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "nombre" => "required|string",
            "fecha" => "required|date",
            "activo" => "required|boolean"
        ]);

        $marca = Marcas::create([
            "nombre" => $data["nombre"],
            "fecha" => $data["fecha"],
            "activo" => $data["activo"]
        ]);

        if ($marca) {
            return redirect()->route("marcas.index");
        } else {
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $marca = Marcas::find($id);
        return view("marcas.show", compact("marca"));
    }

    public function edit($id)
    {
        $marca = Marcas::find($id);
        return view("marcas.edit", compact("marca"));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "nombre" => "required|string",
            "fecha" => "required|date",
            "activo" => "required|boolean"
        ]);

        $marca = Marcas::find($id);
        $marca->update($data);

        return redirect()->route("marcas.index");
    }

    public function destroy($id)
    {
        $marca = Marcas::find($id);
        $marca->update(['activo' => 0]); // Cambia el estado a inactivo
        return redirect()->route('marcas.index'); // Redirige a la lista de marcas
    }
}
