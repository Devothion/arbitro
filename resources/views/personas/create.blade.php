@extends('layouts.app')

@section('title')
    Crear Demandado
@endsection

@section('styles')
    <style>
        #form_persona, #form_personado {
            display: none;
        }
        /*#form_empresa, #form_empresado {
            display: none;
        }*/
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
            <h3 class="font-strong mb-0 mt-1">REGISTRO</h3>

            <p>(Registre una cuenta como parte: demandante / demandado)</p>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="row mb-3">
                        <div class="col-sm-6 form-group">
                            <label for="registrodo" class="col-form-label text-md-end">
                                <input type="radio" id="empresa" name="registrodo" checked class="registrodo" value="empresa" /> EMPRESA
                            </label>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="registrodo" class="col-form-label text-md-end">
                                <input type="radio" id="persona" name="registrodo" class="registrodo" value="persona" /> PERSONA NATURAL
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('empresas.store') }}" enctype="multipart/form-data" id="form_empresado">
                        @csrf

                        <input type="hidden" id="registro" name="registro" value="2" />

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
                            <label class="subtitle col-md-12">Datos empresa</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6 form-group">
                                <label for="ruc" class="col-form-label text-md-end">RUC</label>

                                <div class="">
                                    <input id="ruc" type="number" class="form-control @error('ruc') is-invalid @enderror" name="ruc" value="{{ old('ruc') }}" autocomplete="ruc" autofocus>

                                    @error('ruc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <label for="razon_social" class="col-form-label text-md-end">Razón social</label>

                                <div class="">
                                    <input id="razon_social" type="text" class="form-control @error('razon_social') is-invalid @enderror" name="razon_social" value="{{ old('razon_social') }}" autocomplete="razon_social" autofocus>

                                    @error('razon_social')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Contacto y residencia</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <table class="table" id="dynamicEmpresa">
                                    <tr>
                                        <td>
                                            <label for="telefono" class="col-form-label text-md-end">Teléfono</label>
                                            <input type="number" id="telefono" name="telefono[]" placeholder="Ejemplo: +51 987 987 987" class="form-control" />
                                        </td>

                                        <td>
                                            <label for="email" class="col-form-label text-md-end">Correo electrónico</label>
                                            <input type="email" id="email" name="email[]" placeholder="Ejemplo: ejemplo@gmail.com" class="form-control" />
                                        </td>

                                        <td>
                                            <label for="dynamic_emp" class="col-form-label text-md-end">*Puede agregar más de uno</label>
                                            <button type="button" name="add_emp" id="dynamic_emp" class="btn btn-success col-md-12">Agregar</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Contacto y residencia</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2 form-group">
                                <label for="tip_calle" class="col-form-label text-md-end">Tipo de calle</label>

                                <div class="">
                                    <select type="select" id="tip_calle" class="form-control @error('tip_calle') is-invalid @enderror" name="tip_calle" value="{{ old('tip_calle') }}" autocomplete="name" autofocus>
                                        <option value="">Selecciona</option>
                                        <option value="Avenida">Avenida</option>
                                        <option value="Jiron">Jirón</option>
                                        <option value="Calle">Calle</option>
                                        <option value="Pasaje">Pasaje</option>
                                    </select>

                                    @error('tip_calle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-8 form-group">
                                <label for="nombre_calle" class="col-form-label text-md-end">Nombre</label>

                                <div class="">
                                    <input id="nombre_calle" type="text" class="form-control @error('nombre_calle') is-invalid @enderror" name="nombre_calle" value="{{ old('nombre_calle') }}" autocomplete="name" autofocus>

                                    @error('nombre_calle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2 form-group">
                                <label for="numero" class="col-form-label text-md-end">Número</label>

                                <div class="">
                                    <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" autocomplete="name" autofocus>

                                    @error('numero')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6 form-group">
                                <label for="urbanizacion" class="col-form-label text-md-end">Urbanización, Grupo residencial, otro</label>

                                <div class="">
                                    <input id="urbanizacion" type="text" class="form-control @error('urbanizacion') is-invalid @enderror" name="urbanizacion" value="{{ old('urbanizacion') }}" autocomplete="name" autofocus>

                                    @error('urbanizacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="referencia" class="col-form-label text-md-end">Referencia</label>

                                <div class="">
                                    <input id="referencia" type="text" class="form-control @error('referencia') is-invalid @enderror" name="referencia" value="{{ old('referencia') }}" autofocus>

                                    @error('referencia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 form-group">
                                <label for="departamento" class="col-form-label text-md-end">Departamento</label>

                                <div class="">
                                    <select type="select" class="form-control  @error('departamento') is-invalid @enderror" name="departamento" id="departamento">
                                        <option value="">Departamento</option>
                                        @foreach($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}">{{ $departamento->departamento }}</option>
                                        @endforeach
                                    </select>

                                    @error('departamento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="provincia" class="col-form-label text-md-end">Provincia</label>

                                <div class="">
                                    <select type="select" class="form-control  @error('provincia') is-invalid @enderror" name="provincia" id="provincia">
                                        
                                    </select>

                                    @error('provincia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="distrito" class="col-form-label text-md-end">Distrito</label>

                                <div class="">
                                    <select type="select" class="form-control  @error('distrito') is-invalid @enderror" name="distrito" id="distrito">
                                    
                                    </select>

                                    @error('distrito')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <button type="submit" class="btn btn-info col-md-12">
                                {{ __('REGÍSTRAR') }}
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('personas.store') }}" enctype="multipart/form-data" id="form_personado">
                        @csrf

                        <input type="hidden" id="registro" name="registro" value="2" />

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
                                    <input id="dni" type="number" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" autocomplete="name" autofocus>

                                    @error('dni')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-4 form-group">
                                <label for="ape_pat" class="col-form-label text-md-end">Apellido Paterno</label>

                                <div class="">
                                    <input id="ape_pat" type="text" class="form-control @error('ape_pat') is-invalid @enderror" name="ape_pat" value="{{ old('ape_pat') }}" autocomplete="name" autofocus>

                                    @error('ape_pat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="ape_mat" class="col-form-label text-md-end">Apellido Materno</label>

                                <div class="">
                                    <input id="ape_mat" type="text" class="form-control @error('ape_mat') is-invalid @enderror" name="ape_mat" value="{{ old('ape_mat') }}" autocomplete="name" autofocus>

                                    @error('ape_mat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="name" class="col-form-label text-md-end">Nombre(s)</label>

                                <div class="">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Contacto y residencia</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <table class="table" id="dynamicPersona">
                                    <tr>
                                        <td>
                                            <label for="telefono" class="col-form-label text-md-end">Teléfono</label>
                                            <input type="number" id="telefono" name="telefono[]" placeholder="Ejemplo: +51 987 987 987" class="form-control" />
                                        </td>

                                        <td>
                                            <label for="email" class="col-form-label text-md-end">Correo electrónico</label>
                                            <input type="email" id="email" name="email[]" placeholder="Ejemplo: ejemplo@gmail.com" class="form-control" />
                                        </td>

                                        <td>
                                            <label for="dynamic_per" class="col-form-label text-md-end">*Puede agregar más de uno</label>
                                            <button type="button" name="add_per" id="dynamic_per" class="btn btn-success col-md-12">Agregar</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2 form-group">
                                <label for="tip_calle" class="col-form-label text-md-end">Tipo de calle</label>

                                <div class="">
                                    <select type="select" id="tip_calle" class="form-control @error('tip_calle') is-invalid @enderror" name="tip_calle" value="{{ old('tip_calle') }}" autocomplete="name" autofocus>
                                        <option value="">Selecciona</option>
                                        <option value="Avenida">Avenida</option>
                                        <option value="Jiron">Jirón</option>
                                        <option value="Calle">Calle</option>
                                        <option value="Pasaje">Pasaje</option>
                                    </select>

                                    @error('tip_calle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-8 form-group">
                                <label for="nombre_calle" class="col-form-label text-md-end">Nombre</label>

                                <div class="">
                                    <input id="nombre_calle" type="text" class="form-control @error('nombre_calle') is-invalid @enderror" name="nombre_calle" value="{{ old('nombre_calle') }}" autocomplete="name" autofocus>

                                    @error('nombre_calle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2 form-group">
                                <label for="numero" class="col-form-label text-md-end">Número</label>

                                <div class="">
                                    <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" autocomplete="name" autofocus>

                                    @error('numero')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6 form-group">
                                <label for="urbanizacion" class="col-form-label text-md-end">Urbanización, Grupo residencial, otro</label>

                                <div class="">
                                    <input id="urbanizacion" type="text" class="form-control @error('urbanizacion') is-invalid @enderror" name="urbanizacion" value="{{ old('urbanizacion') }}" autocomplete="name" autofocus>

                                    @error('urbanizacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="referencia" class="col-form-label text-md-end">Referencia</label>

                                <div class="">
                                    <input id="referencia" type="text" class="form-control @error('referencia') is-invalid @enderror" name="referencia" value="{{ old('referencia') }}" autofocus>

                                    @error('referencia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 form-group">
                                <label for="departamento" class="col-form-label text-md-end">Departamento</label>

                                <div class="">
                                    <select type="select" class="form-control  @error('departamento') is-invalid @enderror" name="departamento" id="departamentoPer">
                                        <option value="">Departamento</option>
                                        @foreach($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}">{{ $departamento->departamento }}</option>
                                        @endforeach
                                    </select>

                                    @error('departamento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="provincia" class="col-form-label text-md-end">Provincia</label>

                                <div class="">
                                    <select type="select" class="form-control  @error('provincia') is-invalid @enderror" name="provincia" id="provinciaPer">
                                        
                                    </select>

                                    @error('provincia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="distrito" class="col-form-label text-md-end">Distrito</label>

                                <div class="">
                                    <select type="select" class="form-control  @error('distrito') is-invalid @enderror" name="distrito" id="distritoPer">
                                    
                                    </select>

                                    @error('distrito')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <button type="submit" class="btn btn-info col-md-12">
                                {{ __('REGÍSTRAR') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.registrote').on('change', function() {
                if(this.value == 'empresa'){
                    $("#form_empresa").show();
                    $("#form_persona").hide();
                }else{
                    $("#form_persona").show();
                    $("#form_empresa").hide();
                }
            });

            $('.registrodo').on('change', function() {
                if(this.value == 'empresa'){
                    $("#form_empresado").show();
                    $("#form_personado").hide();
                }else{
                    $("#form_personado").show();
                    $("#form_empresado").hide();
                }
            });
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

            $("#departamentoPer").change(function(){
                $.get("{{ url('ajaxprovincias') }}","departamento="+$("#departamentoPer").val(), function(data){
                    $("#provinciaPer").html(data);
                    console.log(data);
                });
            });

            $("#provinciaPer").change(function(){
                $.get("{{ url('ajaxdistritos') }}","provincia="+$("#provinciaPer").val(), function(data){
                    $("#distritoPer").html(data);
                    console.log(data);
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script type="text/javascript">
        var i = 0;
        $("#dynamic_per").click(function () {
            ++i;
            $("#dynamicPersona").append('<tr><td><input type="number" id="telefono" name="telefono[]" placeholder="Ejemplo: +51 987 987 987" class="form-control" /></td><td><input type="email" id="email" name="email[]" placeholder="Ejemplo: ejemplo@gmail.com" class="form-control" /></td><td><button type="button" class="col-md-12 btn btn-danger remove-input-persona">Eliminar</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-input-persona', function () {
            $(this).parents('tr').remove();
        });
    </script>

    <script type="text/javascript">
        var i = 0;
        $("#dynamic_emp").click(function () {
            ++i;
            $("#dynamicEmpresa").append('<tr><td><input type="number" id="telefono" name="telefono[]" placeholder="Ejemplo: +51 987 987 987" class="form-control" /></td><td><input type="email" id="email" name="email[]" placeholder="Ejemplo: ejemplo@gmail.com" class="form-control" /></td><td><button type="button" class="col-md-12 btn btn-danger remove-input-empresa">Eliminar</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-input-empresa', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
