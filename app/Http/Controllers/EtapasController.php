<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arbitro;
use App\Models\Department;
use App\Models\Province;
use App\Models\District;
use App\Models\Especialidad;
use App\Models\Profesion;
use App\Models\Demandado;
use App\Models\Demandante;
use App\Models\Etapa;
use App\Models\Proceso;
use App\Models\Procesal;

class EtapasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Proceso $Proceso)
    {
        $newStatus = $request->estado;
        $ids = $request->id_proceso;
        Proceso::whereIn('id',explode(",",$ids))->update(['estado' => $newStatus]);

        $etapa = $request->all();

        if($archivo = $request->file('archivo')) {
            $rutaGuardarimg = 'storage/etapas';
            $imagenProducto = date('YmdHis'). "." . $archivo->getClientOriginalExtension();
            $archivo->move($rutaGuardarimg, $imagenProducto);
            $etapa['archivo'] = "$imagenProducto";
        }

        Etapa::create($etapa);
     
        return back()->with('success', 'Nueva Etapa ha sido creado satisfactoriamente.');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
