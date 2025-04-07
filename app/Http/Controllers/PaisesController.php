<?php

namespace App\Http\Controllers;

use App\Models\Paises;
use Illuminate\Http\Request;

class PaisesController extends Controller
{
    public function index()
    {
        $paises = Paises::where('activo', 1)->get();
        return view("paises.index", compact('paises'));
    }

    public function create()
    {
        return view("paises.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "nombre" => "required|string",
            "activo" => "required|boolean"
        ]);

        $pais = Paises::create([
            "nombre" => $data["nombre"],
            "activo" => $data["activo"]
        ]);

        if ($pais) {
            return redirect()->route("paises.index");
        } else {
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $pais = Paises::find($id);
        return view("paises.show", compact("pais"));
    }

    public function edit($id)
    {
        $pais = Paises::find($id);
        return view("paises.edit", compact("pais"));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "nombre" => "required|string",
            "activo" => "required|boolean"
        ]);

        $pais = Paises::find($id);
        $pais->update($data);

        return redirect()->route("paises.index");
    }

    public function destroy($id)
    {
        $pais = Paises::find($id);
        $pais->update(['activo' => 0]); // Cambia el estado a inactivo
        return redirect()->route('paises.index'); // Redirige a la lista de países
    }
}