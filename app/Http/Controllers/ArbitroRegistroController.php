<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arbitro;
use App\Models\Department;
use App\Models\Province;
use App\Models\District;
use App\Models\Especialidad;
use App\Models\Profesion;

class ArbitroRegistroController extends Controller
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
        $arbitro['proceso'] = 'proceso';

        Arbitro::create($arbitro);

        return response()->json([
            'status' => 'success',
        ]);
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
