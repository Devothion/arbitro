<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arbitro;
use App\Models\Department;
use App\Models\Province;
use App\Models\District;
use App\Models\Especialidad;
use App\Models\Profesion;

class ArbitroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arbitros = Arbitro::all();
        return view('arbitros.index', compact('arbitros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Department::all();
        return view('arbitros.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $arbitro = [];

        $arbitro = $request->all();

        if($file_reg = $request->file('file_reg')) {
            $rutaGuardarimg = 'storage/files';
            $imagenProducto = date('YmdHis'). "." . $file_reg->getClientOriginalExtension();
            $file_reg->move($rutaGuardarimg, $imagenProducto);
            $arbitro['file_reg'] = "$imagenProducto";
        }

        $profesion = json_encode($request->profesion);
        $especialidad = json_encode($request->especialidad);

        $arbitro['profesion'] = $profesion;
        $arbitro['especialidad'] = $especialidad;
        $arbitro['proceso'] = '';

        Arbitro::create($arbitro);
     
        return back()->with('success', 'Nuevo Arbitro ha sido creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $departamentos = Department::all();
        $provincias = Province::all();
        $distritos = District::all();
        $especialidades = Especialidad::all();
        $profesiones = Profesion::all();
        $arbitro = Arbitro::find($id);
        return view('arbitros.show', compact('arbitro', 'departamentos', 'provincias', 'distritos', 'especialidades', 'profesiones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departamentos = Department::all();
        $provincias = Province::all();
        $distritos = District::all();
        $especialidades = Especialidad::all();
        $profesiones = Profesion::all();
        $arbitro = Arbitro::find($id);
        return view('arbitros.edit', compact('arbitro', 'departamentos', 'provincias', 'distritos', 'especialidades', 'profesiones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arbitro $Arbitro)
    {
        $arbitro = [];

        $arbitro = $request->all();

        if($file_reg = $request->file('file_reg')) {
            $rutaGuardarimg = 'storage/files';
            $imagenProducto = date('YmdHis'). "." . $file_reg->getClientOriginalExtension();
            $file_reg->move($rutaGuardarimg, $imagenProducto);
            $arbitro['file_reg'] = "$imagenProducto";
        }else{
            unset($arbitro['file_reg']);
        }

        $profesion = json_encode($request->profesion);
        $especialidad = json_encode($request->especialidad);

        $arbitro['profesion'] = $profesion;
        $arbitro['especialidad'] = $especialidad;        

        $Arbitro->update($arbitro);
     
        return back()->with('success', 'El Arbitro ha sido actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Arbitro::destroy($id);
        return redirect()->route('arbitros.index')->with('success','Arbitro eliminado.');
    }
}
