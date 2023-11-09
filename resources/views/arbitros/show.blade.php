@extends('layouts.app')

@section('title')
    Ver Árbitro
@endsection

@section('styles')
    <style>
        .subtitle {
            font-weight: 700;
            font-size: 15px;
            color: #000;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th {
            border: none;
            padding: 0 10px 10px 0;
        }
        @media (max-width: 575px) {

        }
    </style>
@endsection

@section('content')
    <div class="ibox">
        <div class="ibox-body">
            <div class="row">
                <div class="col-lg-12">
                    <form enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Datos personales</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <label for="ape_pat" class="col-form-label text-md-end">DNI</label>

                                <div class="">
                                    <input id="dni" type="number" disabled class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $arbitro->dni }}" autocomplete="name" autofocus>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-4 form-group">
                                <label for="ape_pat" class="col-form-label text-md-end">Apellido Paterno</label>

                                <div class="">
                                    <input id="ape_pat" type="text" disabled class="form-control @error('ape_pat') is-invalid @enderror" name="ape_pat" value="{{ $arbitro->ape_pat }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="ape_mat" class="col-form-label text-md-end">Apellido Materno</label>

                                <div class="">
                                    <input id="ape_mat" type="text" disabled class="form-control @error('ape_mat') is-invalid @enderror" name="ape_mat" value="{{ $arbitro->ape_mat }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="name" class="col-form-label text-md-end">Nombre(s)</label>

                                <div class="">
                                    <input id="name" type="text" disabled class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $arbitro->name }}" autocomplete="name" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Contacto y residencia</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6 form-group">
                                <label for="telefono" class="col-form-label text-md-end">Teléfono</label>

                                <div class="">
                                    <input id="telefono" disabled type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $arbitro->telefono }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="email" class="col-form-label text-md-end">Correo electrónico</label>

                                <div class="">
                                    <input id="email" disabled type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $arbitro->email }}" autocomplete="email">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2 form-group">
                                <label for="tip_calle" class="col-form-label text-md-end">Tipo de calle</label>

                                <div class="">
                                    <select type="select" disabled id="tip_calle" class="form-control @error('tip_calle') is-invalid @enderror" name="tip_calle" autocomplete="name" autofocus>
                                        <option value="">{{ $arbitro->tip_calle }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-8 form-group">
                                <label for="nombre_calle" class="col-form-label text-md-end">Nombre</label>

                                <div class="">
                                    <input id="nombre_calle" disabled type="text" class="form-control @error('nombre_calle') is-invalid @enderror" name="nombre_calle" value="{{ $arbitro->nombre_calle }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="col-sm-2 form-group">
                                <label for="numero" class="col-form-label text-md-end">Número</label>

                                <div class="">
                                    <input id="numero" disabled type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ $arbitro->numero }}" autocomplete="name" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6 form-group">
                                <label for="urbanizacion" class="col-form-label text-md-end">Urbanización, Grupo residencial, otro</label>

                                <div class="">
                                    <input id="urbanizacion" disabled type="text" class="form-control @error('urbanizacion') is-invalid @enderror" name="urbanizacion" value="{{ $arbitro->urbanizacion }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="referencia" class="col-form-label text-md-end">Referencia</label>

                                <div class="">
                                    <input id="referencia" disabled type="text" class="form-control @error('referencia') is-invalid @enderror" name="referencia" value="{{ $arbitro->referencia }}" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 form-group">
                                <label for="departamento" class="col-form-label text-md-end">Departamento</label>

                                <div class="">
                                    <select type="select" disabled class="form-control  @error('departamento') is-invalid @enderror" name="departamento" id="departamento">
                                        @foreach($departamentos as $departamento)
                                            @if($departamento->id == $arbitro->departamento)
                                                <option>{{ $departamento->departamento }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="provincia" class="col-form-label text-md-end">Provincia</label>

                                <div class="">
                                    <select type="select" disabled class="form-control  @error('provincia') is-invalid @enderror" name="provincia" id="provincia">
                                        @foreach($provincias as $provincia)
                                            @if($provincia->id == $arbitro->provincia)
                                                <option>{{ $provincia->provincia }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="distrito" class="col-form-label text-md-end">Distrito</label>

                                <div class="">
                                    <select type="select" disabled class="form-control  @error('distrito') is-invalid @enderror" name="distrito" id="distrito">
                                        @foreach($distritos as $distrito)
                                            @if($distrito->id == $arbitro->distrito)
                                                <option>{{ $distrito->distrito }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Registro nacional de árbitros</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 form-group">
                                <label for="numero_reg" class="col-form-label text-md-end">Número</label>

                                <div class="">
                                    <input id="numero_reg" disabled type="text" class="form-control @error('numero_reg') is-invalid @enderror" name="numero_reg" value="{{ $arbitro->numero_reg }}" autocomplete="numero_reg" autofocus>
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="file_reg" class="col-form-label text-md-end">Adjuntar</label>

                                <div class="">
                                    <a class="form-control btn btn-success">Descargar adjunto</a>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6 form-group">
                                <label class="subtitle col-md-12">Profesión</label>

                                <div class="">
                                    @php
                                        $profesion = json_decode($arbitro->profesion, true);
                                    @endphp

                                    @foreach($profesion as $item)
                                        <p>{{ $item }}</p>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label class="subtitle col-md-12">Especialidad</label>

                                <div class="">
                                    @php
                                        $especialidad = json_decode($arbitro->especialidad, true);
                                    @endphp

                                    @foreach($especialidad as $item)
                                        <p>{{ $item }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection
