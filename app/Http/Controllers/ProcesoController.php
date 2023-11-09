<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arbitro;
use App\Models\Department;
use App\Models\Province;
use App\Models\District;
use App\Models\Especialidad;
use App\Models\Profesion;
use App\Models\Proceso;
use App\Models\Empresa;
use App\Models\Persona;
use DB;
use App\Models\Etapa;
use App\Models\Tribunal;
use App\Models\Procesal;
use App\Models\Respuesta;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arbitros = Arbitro::all();
        $procesos = Proceso::all();
        return view('procesos.index', compact('arbitros', 'procesos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $arbitros = Arbitro::all();
        $procesos = Proceso::all();
        $personas = Persona::all();
        $empresas = Empresa::all();
        $tribunals = Tribunal::all();
        $procesales = Procesal::all();
        $departamentos = Department::all();

        return view('procesos.create', compact('arbitros', 'procesos', 'departamentos', 'personas', 'empresas', 'tribunals', 'procesales'));
    }

    public function autocomplete(Request $request)
    {
        if($request->get('query')) {
            $query = $request->get('query');

            $data = DB::table('arbitros')
                ->where('dni', 'LIKE', "%{$query}%")
                ->orwhere('name', 'LIKE', "%{$query}%")
                ->get();

            $output = '<ul class="dropdown-menu" style="display:block; position:relative;width:100%;">';

            foreach($data as $row) {
                $output .= '
                <li><a class="dropdown-item">'.$row->dni.'</a></li>
                ';
            }

            $output .= '</ul>';
            echo $output;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proceso = [];

        $data_arb_dni       = json_encode($request->data_arb_dni);
        $data_arb_parte     = json_encode($request->data_arb_parte);
        $data_arb_estado    = json_encode($request->data_arb_estado);
        
        $id_demandante      = json_encode($request->id_demandante);
        $id_demandado       = json_encode($request->id_demandado);

        $dep_monto          = json_encode($request->dep_monto);
        $dep_fecha          = json_encode($request->dep_fecha);

        foreach($request->file('dep_file') as $image){
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/storage/aranceles/', $name);  
            $data[] = $name;  
        }

        $dep_file           = json_encode($data);
        $ane_nombre         = json_encode($request->ane_nombre);

        foreach($request->file('ane_doc') as $imageAne){
            $nameAne=$imageAne->getClientOriginalName();
            $imageAne->move(public_path().'/storage/anexos/', $nameAne);  
            $dataAne[] = $nameAne;  
        }

        $ane_doc            = json_encode($dataAne);

        $proceso['proceso']                 = $request->proceso;
        $proceso['med_cau']                 = $request->med_cau;
        $proceso['cuantia']                 = $request->cuantia;
        $proceso['moneda']                  = $request->moneda;
        $proceso['descripcion']             = $request->descripcion;
        $proceso['tribunal']                = $request->tribunal;
        $proceso['data_arb_dni']            = $data_arb_dni;
        $proceso['data_arb_parte']          = $data_arb_parte;
        $proceso['data_arb_estado']         = $data_arb_estado;
        $proceso['id_demandante']           = $id_demandante;
        $proceso['id_demandado']            = $id_demandado;
        $proceso['dep_monto']               = $dep_monto;
        $proceso['dep_fecha']               = $dep_fecha;
        $proceso['dep_file']                = $dep_file;
        $proceso['contrato']                = $request->contrato;

        if($cla_arb = $request->file('cla_arb')) {
            $rutaGuardarimg = 'storage/clausulas';
            $imagenProducto = date('YmdHis'). "." . $cla_arb->getClientOriginalExtension();
            $cla_arb->move($rutaGuardarimg, $imagenProducto);
            $proceso['cla_arb'] = "$imagenProducto";
        }
        
        $proceso['ane_nombre']              = $ane_nombre;
        $proceso['ane_doc']                 = $ane_doc;
        $proceso['observaciones']           = $request->observaciones;

        $id_pro = Proceso::create($proceso);
     
        return back()->with('success', 'Nuevo Proceso ha sido creado satisfactoriamente.');
    }

    public function arbitro(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $arbitros = Arbitro::all();
        $procesos = Proceso::all();
        $personas = Persona::all();
        $empresas = Empresa::all();
        $departamentos = Department::all();
        $provincias = Province::all();
        $distritos = District::all();
        $proceso = Proceso::find($id);
        $etapas = Etapa::all();
        $tribunals = Tribunal::all();
        $procesales = Procesal::all();
        $respuestas = Respuesta::all();
        
        return view('procesos.show', compact('arbitros', 'procesos', 'departamentos', 'personas', 'empresas', 'proceso', 'etapas', 'tribunals', 'procesales', 'respuestas', 'provincias', 'distritos'));
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
