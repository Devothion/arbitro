@extends('layouts.app')

@section('title')
    Detalle expediente
@endsection

@section('styles')
    <style>
        .subtitle {
            font-weight: 700;
            font-size: 15px;
            color: #000;
            /*border-bottom: 1px solid #000;*/
            padding-bottom: 10px;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th {
            border: none;
        }
        @media (max-width: 575px) {

        }
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
        }
        .tab button {
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            background-color: #f1f1f1;
            margin-right: 5px;
        }
        .tab button:hover {
            background-color: #ddd;
        }
        .tab button.active {
            background-color: #18c5a9;
            color: #fff;
            border: 1px solid #18c5a9;
        }
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
        .modal-dialog {
            max-width: 1200px;
        }
    </style>
@endsection

@section('content')
    <div class="ibox">
        <div class="ibox-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab">
                        <button class="tablinks active" onclick="openCity(event, 'expediente')">Datos Expediente</button>
                        <button class="tablinks" onclick="openCity(event, 'demandante')">Demandantes</button>
                        <button class="tablinks" onclick="openCity(event, 'demandado')">Demandados</button>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div id="expediente" class="tabcontent" style="display:block;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <div class="expediente_text">
                                        N° Expediente:<span>PA-CAJ-2023-00{{ $proceso->id }}</span>
                                    </div>

                                    <table class="table table-bordered col-md-12" id="products-table">
                                        <thead class="thead-default thead-lg">
                                            <tr>
                                                <th>Estado</th>
                                                <th>Cuantía</th>
                                                <th>Moneda</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    @if($proceso->estado == "1")
                                                        EN CALIFICACIÓN
                                                    @elseif($proceso->estado == "2")
                                                        proceso
                                                    @elseif($proceso->estado == "3")
                                                        CONFORMACIÓN DE TRIBUNAL
                                                    @elseif($proceso->estado == "4")
                                                        ETAPA DE INSTRUCCIÓN DEL TRIBUNAL ARBITRAL
                                                    @elseif($proceso->estado == "5")
                                                        INADMISIBLE
                                                    @elseif($proceso->estado == "6")
                                                        PARA LAUDAR
                                                    @elseif($proceso->estado == "7")
                                                        LAUDO
                                                    @else
                                                        EN CALIFICACIÓN
                                                    @endif
                                                </td>

                                                <td>{{ $proceso->cuantia }}</td>
                                                <td>{{ $proceso->moneda }}</td>
                                                <td><button class="btn btn-default">Ver cálculo</button></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="descr_cont">
                                        <label class="subtitle">Descripción de controversia</label>

                                        <div class="descr_text">
                                            {{ $proceso->descripcion }}
                                        </div>
                                    </div>

                                    <label class="subtitle text-success">Archivos adjuntos</label>

                                    <table class="table table-bordered col-md-12" id="procesos-table">
                                        <thead class="thead-default thead-lg">
                                            <tr>
                                                <th>Contrato</th>
                                                <th>Clausula arbitral</th>
                                                <th>Vigencia de poder</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a target="_BLANK" href="{{ asset('/storage/clausulas/') .'/'. $proceso->cla_arb }}">
                                                        Ver archivo <i class="sidebar-item-icon ti-archive"></i>
                                                    </a>
                                                </td>

                                                <td>
                                                    <a target="_BLANK" href="{{ asset('/storage/clausulas/') .'/'. $proceso->cla_arb }}">
                                                        Ver archivo <i class="sidebar-item-icon ti-archive"></i>
                                                    </a>
                                                </td>

                                                <td>
                                                    <a target="_BLANK" href="{{ asset('/storage/clausulas/') .'/'. $proceso->cla_arb }}">
                                                        Descargar <i class="sidebar-item-icon ti-archive"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="subtitle">ETAPAS</label>

                                <div class="form-group">
                                    @if (Session::has('success'))
                                        <div class="alert alert-success text-center">
                                            <p style="margin-bottom: 0;">{{ Session::get('success') }}</p>
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                <form method="POST" class="row mb-2" action="{{ route('etapas.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input id="id_proceso" name="id_proceso" type="hidden" value="{{ $proceso->id }}" />

                                    <div class="col-md-4">
                                        <select type="select" id="estado" class="form-control @error('estado') is-invalid @enderror" name="estado" value="{{ old('estado') }}" autocomplete="estado" autofocus>
                                            <option value="">Selecciona</option>
                                            <option value="1">EN CALIFICACIÓN</option>
                                            <option value="2">ADMITIDO</option>
                                            <option value="3">CONFORMACIÓN DE TRIBUNAL</option>
                                            <option value="4">ETAPA DE INSTRUCCIÓN DEL TRIBUNAL ARBITRAL</option>
                                            <option value="5">INADMISIBLE</option>
                                            <option value="6">PARA LAUDAR</option>
                                            <option value="7">LAUDO</option>
                                        </select>
                                    </div>

                                    <div class="col-md-5">
                                        <input id="archivo" type="file" class="form-control @error('archivo') is-invalid @enderror" name="archivo">
                                    </div>

                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-info col-md-12">
                                            {{ __('GUARDAR') }}
                                        </button>
                                    </div>
                                </form>

                                <table class="table table-bordered col-md-12" id="etapas-table">
                                    <thead class="thead-default thead-lg">
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>Archivo</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($etapas as $etapa)
                                            @if($etapa->id_proceso == $proceso->id)
                                                <tr>
                                                    <td>{{ $etapa->created_at }}</td>

                                                    <td>
                                                        @if($etapa->estado == "1")
                                                            EN CALIFICACIÓN
                                                        @elseif($etapa->estado == "2")
                                                            ADMITIDO
                                                        @elseif($etapa->estado == "3")
                                                            CONFORMACIÓN DE TRIBUNAL
                                                        @elseif($etapa->estado == "4")
                                                            ETAPA DE INSTRUCCIÓN DEL TRIBUNAL ARBITRAL
                                                        @elseif($etapa->estado == "5")
                                                            INADMISIBLE
                                                        @elseif($etapa->estado == "6")
                                                            PARA LAUDAR
                                                        @elseif($etapa->estado == "7")
                                                            LAUDO
                                                        @else
                                                            EN CALIFICACIÓN
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if($etapa->archivo)
                                                            <a href="{{ asset('/storage/etapas'.'/'.$etapa->archivo) }}" target="_BLANK">Ver</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="demandante" class="tabcontent">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="demandantes-table">
                                        <thead class="thead-default thead-lg">
                                            <tr>
                                                <th>DNI</th>
                                                <th>Nombre completo</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $id_demandante = json_decode($proceso->id_demandante, true);
                                            @endphp

                                            @foreach($personas as $persona)
                                                @foreach($id_demandante as $item)
                                                    @if($item == $persona->id)
                                                        <tr>
                                                            <td>{{ $persona->dni }}</td>
                                                            <td>{{ $persona->name .' '. $persona->ape_pat .' '. $persona->ape_mat }}</td>
                                                            <td><a data-toggle="modal" data-target="#dataPersona{{ $persona->id }}">Ver</a></td>
                                                        </tr>

                                                        <div id="dataPersona{{ $persona->id }}" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="col-lg-12">
                                                                            <label class="subtitle">DATOS DEL DEMANDANTE</label>
                                                                        </div>
                                                                    </div>

                                                                    @include('procesos.modal_persona')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach

                                            @foreach($empresas as $empresa)
                                                @foreach($id_demandante as $item)
                                                    @if($item == $empresa->id)
                                                        <tr>
                                                            <td>{{ $empresa->ruc }}</td>
                                                            <td>{{ $empresa->razon_social }}</td>
                                                            <td><a data-toggle="modal" data-target="#dataEmpresa{{ $empresa->id }}">Ver</a></td>
                                                        </tr>

                                                        <div id="dataEmpresa{{ $empresa->id }}" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="col-lg-12">
                                                                            <label class="subtitle">DATOS DEL DEMANDANTE</label>
                                                                        </div>
                                                                    </div>

                                                                    @include('procesos.modal_empresa')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="demandado" class="tabcontent">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="demandados-table">
                                        <thead class="thead-default thead-lg">
                                            <tr>
                                                <th>DNI</th>
                                                <th>Nombre completo</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $id_demandado = json_decode($proceso->id_demandado, true);
                                            @endphp

                                            @foreach($personas as $persona)
                                                @foreach($id_demandado as $item)
                                                    @if($item == $persona->id)
                                                        <tr>
                                                            <td>{{ $persona->dni }}</td>
                                                            <td>{{ $persona->name .' '. $persona->ape_pat .' '. $persona->ape_mat }}</td>
                                                            <td><a data-toggle="modal" data-target="#dataPersona{{ $persona->id }}">Ver</a></td>
                                                        </tr>

                                                        <div id="dataPersona{{ $persona->id }}" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="col-lg-12">
                                                                            <label class="subtitle">DATOS DEL DEMANDADO</label>
                                                                        </div>
                                                                    </div>

                                                                    @include('procesos.modal_persona')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach

                                            @foreach($empresas as $empresa)
                                                @foreach($id_demandado as $item)
                                                    @if($item == $empresa->id)
                                                        <tr>
                                                            <td>{{ $empresa->ruc }}</td>
                                                            <td>{{ $empresa->razon_social }}</td>
                                                            <td><a data-toggle="modal" data-target="#dataEmpresa{{ $empresa->id }}">Ver</a></td>
                                                        </tr>

                                                        <div id="dataEmpresa{{ $empresa->id }}" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="col-lg-12">
                                                                            <label class="subtitle">DATOS DEL DEMANDADO</label>
                                                                        </div>
                                                                    </div>

                                                                    @include('procesos.modal_empresa')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ibox">
        <div class="ibox-body">
            <div class="row">
                <div class="col-lg-12">
                    <label class="subtitle">CONFORMACIÓN DE TRIBUNAL</label>
                </div>
                
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="demandantes-table">
                            <thead class="thead-default thead-lg">
                                <tr>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Parte</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $data_arb_dni   = json_decode($proceso->data_arb_dni, true);
                                    $data_arb_parte = json_decode($proceso->data_arb_parte, true);
                                @endphp

                                @foreach($arbitros as $arbitro)
                                    @foreach($data_arb_dni as $key => $item)
                                        @if($item == $arbitro->dni)
                                            <tr>
                                                <td>{{ $arbitro->name.' '.$arbitro->ape_pat.' '.$arbitro->ape_mat }}</td>
                                                <td>{{ $item }}</td>
                                                <td>{{ $data_arb_parte[$key] }}</td>
                                                <td>Designado</td>
                                                <td>Editar</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ibox">
        <div class="ibox-body">
            <div class="row">
                <div class="col-lg-12">
                    <label class="subtitle">ACTUACIONES PROCESALES</label>
                </div>
                
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div class="form-group">
                            @if (Session::has('procesal'))
                                <div class="alert alert-success text-center">
                                    <p style="margin-bottom: 0;">{{ Session::get('procesal') }}</p>
                                </div>
                            @endif

                            @if (Session::has('procesaldanger'))
                                <div class="alert alert-danger text-center">
                                    <p style="margin-bottom: 0;">{{ Session::get('procesaldanger') }}</p>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <form method="POST" class="row mb-2" action="{{ route('procesales.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <input id="id_proceso" name="id_proceso" type="hidden" value="{{ $proceso->id }}" />

                            <div class="col-md-4">
                                <label for="descripcion" class="col-form-label"><b>Descripción</b></label>

                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" autocomplete="descripcion" autofocus>
                            </div>

                            <div class="col-md-2">
                                <label for="tipo" class="col-form-label"><b>Tipo</b></label>

                                <select type="select" id="tipo" class="form-control" name="tipo">
                                    <option value="">Selecciona</option>
                                    <option value="1">Presentación</option>
                                    <option value="2">Dirigido</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="solicitado" class="col-form-label"><b>Solicitar a:</b></label>

                                <select type="select" id="solicitado" class="form-control" name="solicitado">
                                    <option value="">Selecciona</option>
                                    <option value="1">Ambas partes</option>
                                    <option value="2">Demandante</option>
                                    <option value="3">Demandado</option>
                                    <option value="4">Centro de arbitraje</option>
                                    <option value="5">Consejo superior</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="sustento" class="col-form-label"><b>Sustento:</b></label>

                                <input id="sustento" type="file" class="form-control @error('sustento') is-invalid @enderror" name="sustento">
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-info col-md-12 mt-4">
                                    {{ __('GUARDAR') }}
                                </button>
                            </div>
                        </form>

                        <table class="table table-bordered table-hover" id="demandantes-table">
                            <thead class="thead-default thead-lg">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Tipo</th>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                    <th>Solicitante</th>
                                    <th>Solicitado a</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($procesales as $procesal)
                                    @if($procesal->id_proceso == $proceso->id)
                                        <tr>
                                            <td>{{ $procesal->created_at }}</td>

                                            <td>
                                                @if($procesal->tipo == "1")
                                                    PRESENTACIÓN
                                                @elseif($procesal->tipo == "2")
                                                    DIRIGIDO
                                                @else
                                                    PRESENTACIÓN
                                                @endif
                                            </td>
                                            
                                            <td>{{ $procesal->descripcion }}</td>
                                            <td>{{ $procesal->created_at }}</td>

                                            <td>
                                                @if($procesal->tipo == "1")
                                                    Consejo Superior
                                                @elseif($procesal->tipo == "2")
                                                    Centro de arbitraje
                                                @else
                                                    Consejo Superior
                                                @endif
                                            </td>

                                            <td>
                                                @if($procesal->solicitado == "1")
                                                    Ambas partes
                                                @elseif($procesal->solicitado == "2")
                                                    Demandante
                                                @elseif($procesal->solicitado == "3")
                                                    Demandado
                                                @elseif($procesal->solicitado == "4")
                                                    Centro de arbitraje
                                                @elseif($procesal->solicitado == "5")
                                                    Consejo superior
                                                @else
                                                    Ambas partes
                                                @endif
                                            </td>

                                            <td>
                                                <a class="text-light mr-3 font-16" style="float: left" id="ver_procesal" name="ver_procesal" data-toggle="modal" data-target="#respuestas{{ $procesal->id }}">Ver</a>
                                            
                                                <form style="float: left" action="{{ route('procesales.destroy', $procesal->id) }}"  method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button style="border: none; background-color: transparent;" type="submit" class="text-light font-16" href="">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($procesales as $procesal)
        @if($procesal->id_proceso == $proceso->id)
            <div id="respuestas{{ $procesal->id }}" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <label class="subtitle">RESPUESTAS</label>
                            </div>
                            
                            <div class="col-lg-12">
                                <form method="POST" class="row mb-2" action="{{ route('respuestas.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input id="id_proceso" name="id_proceso" type="hidden" value="{{ $proceso->id }}" />
                                    <input id="id_procesal" name="id_procesal" type="hidden" value="{{ $procesal->id }}" />

                                    <div class="col-md-6">
                                        <label for="descripcion" class="col-form-label"><b>Descripción</b></label>

                                        <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" autocomplete="descripcion" autofocus>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="documento" class="col-form-label"><b>Documento:</b></label>

                                        <input id="documento" type="file" class="form-control @error('documento') is-invalid @enderror" name="documento">
                                    </div>

                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-info col-md-12 mt-4">
                                            {{ __('GUARDAR') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <table class="table table-bordered table-hover" id="demandantes-table">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Descripción</th>
                                        <th>Documento</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($respuestas as $respuesta)
                                        @if($proceso->id == $respuesta->id_proceso)
                                            @if($procesal->id == $respuesta->id_procesal)
                                                <tr>
                                                    <td>{{ $respuesta->created_at }}</td>
                                                    
                                                    <td>{{ $respuesta->descripcion }}</td>

                                                    <td>
                                                        <a href="{{ asset('/storage/respuestas/') }}/{{ $respuesta->documento }}" class="btn btn-primary">Descargar</a>
                                                    </td>

                                                    <td>
                                                        <form style="float: left" action="{{ route('respuestas.destroy', $respuesta->id) }}"  method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button style="border: none; background-color: transparent;" type="submit" class="text-light font-16" href="">Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection

@section('scripts')
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tabcontent");

            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablinks");

            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endsection
