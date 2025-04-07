<?php

namespace App\Http\Controllers;

use App\Models\Motos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;  #cfirst


class MotosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()  #second
    {
        $motos = Motos::where('activo', "=", 1)->get();
        return view("motos.index", compact('motos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("motos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            "nombre"=>"required|string",
            "fecha"=>"required|date",
            "pais_id"=>"required|integer",
            "precio"=>"required|numeric",
            "activo"=>"boolean|default:1"
        ]);
        $moto = Motos::create([
            "nombre"=>$data["nombre"],
            "fecha"=>$data["fecha"],
            "pais_id"=>$data["pais_id"],
            "precio"=>$data["precio"],
            "activo"=> 1
        ])->save();
        if($moto) return redirect()->route("motos.index");
        else return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show($id) 
    {
        $moto = Motos::find($id);
        return view("motos.show", compact("moto"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $moto = Motos::find($id);
        return view("motos.edit", compact("moto"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        
        $data = $request->validate([
            "nombre"=>"required|string",
            "fecha"=>"required|date",
            "pais_id"=>"required|integer",
            "precio"=>"required|numeric",

        ]);
        $moto = Motos::find($id);
        $moto->update($data);
        if($moto) return redirect()->route("motos.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $moto = Motos::find($id);
        $moto->update(["activo"=>0]);
        return redirect()->route("motos.index");
    }
}
