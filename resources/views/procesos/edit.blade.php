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
                    <form method="POST" action="{{ route('arbitros.update', $arbitro->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
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
                        </div>

                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Datos personales</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <label for="ape_pat" class="col-form-label text-md-end">DNI</label>

                                <div class="">
                                    <input id="dni" type="number" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $arbitro->dni }}" autocomplete="name" autofocus>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-4 form-group">
                                <label for="ape_pat" class="col-form-label text-md-end">Apellido Paterno</label>

                                <div class="">
                                    <input id="ape_pat" type="text" class="form-control @error('ape_pat') is-invalid @enderror" name="ape_pat" value="{{ $arbitro->ape_pat }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="ape_mat" class="col-form-label text-md-end">Apellido Materno</label>

                                <div class="">
                                    <input id="ape_mat" type="text" class="form-control @error('ape_mat') is-invalid @enderror" name="ape_mat" value="{{ $arbitro->ape_mat }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="name" class="col-form-label text-md-end">Nombre(s)</label>

                                <div class="">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $arbitro->name }}" autocomplete="name" autofocus>
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
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $arbitro->telefono }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="email" class="col-form-label text-md-end">Correo electrónico</label>

                                <div class="">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $arbitro->email }}" autocomplete="email">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2 form-group">
                                <label for="tip_calle" class="col-form-label text-md-end">Tipo de calle</label>

                                <div class="">
                                    <select type="select" id="tip_calle" class="form-control @error('tip_calle') is-invalid @enderror" name="tip_calle" value="{{ $arbitro->tip_calle }}" autocomplete="name" autofocus>
                                        <option value="{{ $arbitro->tip_calle }}">{{ $arbitro->tip_calle }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-8 form-group">
                                <label for="nombre_calle" class="col-form-label text-md-end">Nombre</label>

                                <div class="">
                                    <input id="nombre_calle" type="text" class="form-control @error('nombre_calle') is-invalid @enderror" name="nombre_calle" value="{{ $arbitro->nombre_calle }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="col-sm-2 form-group">
                                <label for="numero" class="col-form-label text-md-end">Número</label>

                                <div class="">
                                    <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ $arbitro->numero }}" autocomplete="name" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6 form-group">
                                <label for="urbanizacion" class="col-form-label text-md-end">Urbanización, Grupo residencial, otro</label>

                                <div class="">
                                    <input id="urbanizacion" type="text" class="form-control @error('urbanizacion') is-invalid @enderror" name="urbanizacion" value="{{ $arbitro->urbanizacion }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="referencia" class="col-form-label text-md-end">Referencia</label>

                                <div class="">
                                    <input id="referencia" type="text" class="form-control @error('referencia') is-invalid @enderror" name="referencia" value="{{ $arbitro->referencia }}" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 form-group">
                                <label for="departamento" class="col-form-label text-md-end">Departamento</label>

                                <div class="">
                                    <select type="select" class="form-control  @error('departamento') is-invalid @enderror" name="departamento" id="departamento">
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
                                    <select type="select" class="form-control  @error('provincia') is-invalid @enderror" name="provincia" id="provincia">
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
                                    <select type="select" class="form-control  @error('distrito') is-invalid @enderror" name="distrito" id="distrito">
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
                                    <input id="numero_reg" type="text" class="form-control @error('numero_reg') is-invalid @enderror" name="numero_reg" value="{{ $arbitro->numero_reg }}" autocomplete="numero_reg" autofocus>
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="file_reg" class="col-form-label text-md-end">Adjuntar</label>

                                <div class="">
                                    <input id="file_reg" type="file" class="form-control @error('file_reg') is-invalid @enderror" name="file_reg" value="{{ old('file_reg') }}" autocomplete="file_reg">

                                    @error('file_reg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Profesión</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <table class="table" id="dynamicProfesion">
                                    <tr>
                                        <td>
                                            <input type="text" name="profesion[]" placeholder="Ejemplo: Abogado" class="form-control" />
                                        </td>

                                        <td>
                                            <button type="button" name="add_pro" id="dynamic_pro" class="btn btn-success col-md-12">Agregar</button>
                                        </td>

                                        <td>
                                            <div class="">
                                                <span>*Puede agregar más de uno</span>
                                            </div>
                                        </td>
                                    </tr>

                                    @php
                                        $profesion = json_decode($arbitro->profesion, true);
                                    @endphp

                                    @foreach($profesion as $item)
                                        <tr>
                                            <td>
                                                <input type="text" value="{{ $item }}" name="profesion[]" placeholder="Ejemplo: Abogado" class="form-control" />
                                            </td>

                                            <td><button type="button" class="col-md-12 btn btn-danger remove-input-profesion">Eliminar</button></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Especialidad</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <table class="table" id="dynamicEspecialidad">
                                    <tr>
                                        <td>
                                            <input type="text" name="especialidad[]" placeholder="Ejemplo: Maestría derecho civil" class="form-control" />
                                        </td>

                                        <td>
                                            <button type="button" name="add_esp" id="dynamic_esp" class="btn btn-success col-md-12">Agregar</button>
                                        </td>

                                        <td>
                                            <div class="">
                                                <span>*Puede agregar más de uno</span>
                                            </div>
                                        </td>
                                    </tr>

                                    @php
                                        $especialidad = json_decode($arbitro->especialidad, true);
                                    @endphp

                                    @foreach($especialidad as $item)
                                        <tr>
                                            <td>
                                                <input type="text" value="{{ $item }}" name="especialidad[]" placeholder="Ejemplo: Maestría derecho civil" class="form-control" />
                                            </td>

                                            <td><button type="button" class="col-md-12 btn btn-danger remove-input-especialidad">Eliminar</button></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <button type="submit" class="btn btn-info col-md-12">
                                {{ __('ACTUALIZAR') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script type="text/javascript">
        var i = 0;
        $("#dynamic_pro").click(function () {
            ++i;
            $("#dynamicProfesion").append('<tr><td><input type="text" name="profesion[]" placeholder="Ejemplo: Abogado" class="form-control" /></td><td><button type="button" class="col-md-12 btn btn-danger remove-input-profesion">Eliminar</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-input-profesion', function () {
            $(this).parents('tr').remove();
        });
    </script>

    <script type="text/javascript">
        var i = 0;
        $("#dynamic_esp").click(function () {
            ++i;
            $("#dynamicEspecialidad").append('<tr><td><input type="text" name="especialidad[]" placeholder="Ejemplo: Maestría derecho civil" class="form-control" /></td><td><button type="button" class="col-md-12 btn btn-danger remove-input-especialidad">Eliminar</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-input-especialidad', function () {
            $(this).parents('tr').remove();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#departamento").change(function(){
                $.get("{{ url('ajaxprovincias') }}","departamento="+$("#departamento").val(), function(data){
                    $("#provincia").html(data);
                    console.log(data);
                });
            });

            $("#provincia").change(function(){
                $.get("{{ url('ajaxdistritos') }}","provincia="+$("#provincia").val(), function(data){
                    $("#distrito").html(data);
                    console.log(data);
                });
            });
        });
    </script>
@endsection
