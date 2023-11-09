<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arbitro;
use App\Models\Department;
use App\Models\Province;
use App\Models\District;
use App\Models\Especialidad;
use App\Models\Profesion;
use App\Models\Empresa;
use App\Models\Persona;


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Department::all();
        return view('personas.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $persona = [];
        
        $persona = $request->all();

        $telefono = json_encode($request->telefono);
        $email = json_encode($request->email);

        $persona['telefono'] = $telefono;
        $persona['email'] = $email;

        Persona::create($persona);
     
        return back()->with('success', 'Nueva Persona Natural ha sido creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $Persona)
    {
        $persona = [];
        
        $persona = $request->all();

        $telefono = json_encode($request->telefono);
        $email = json_encode($request->email);

        $persona['telefono'] = $telefono;
        $persona['email'] = $email;   

        $Persona->update($persona);

        return response()->json(['success'=>'La Persona natural ha sido actualizado satisfactoriamente.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
