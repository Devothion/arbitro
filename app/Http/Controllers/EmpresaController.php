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

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Department::all();
        return view('empresas.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empresa = [];
        
        $empresa = $request->all();

        $telefono = json_encode($request->telefono);
        $email = json_encode($request->email);

        $empresa['telefono'] = $telefono;
        $empresa['email'] = $email;

        Empresa::create($empresa);
     
        return back()->with('success', 'Nueva Empresa ha sido creado satisfactoriamente.');
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
    public function update(Request $request, Empresa $Empresa)
    {
        $empresa = [];
        
        $empresa = $request->all();

        $telefono = json_encode($request->telefono);
        $email = json_encode($request->email);

        $empresa['telefono'] = $telefono;
        $empresa['email'] = $email;   

        $Empresa->update($empresa);

        return response()->json(['success'=>'La Empresa ha sido actualizado satisfactoriamente.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
