@extends('layouts.app')

@section('title')
    Regístrarse
@endsection

@section('styles')
    <style>
        .title_c {
            font-weight: 700;
            font-size: 23px;
            color: #000;
            text-transform: Uppercase;
            margin-bottom: 50px;
        }
        .card-header {
            font-weight: 700;
            font-size: 24px;
            color: #000;
            padding: 0;
            text-transform: uppercase;
        }
        .subtitle {
            font-weight: 700;
            font-size: 15px;
            color: #000;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
        }
        .card-body {
            padding: 0;
        }
        .form-group {
            margin-bottom: 0;
        }
        .content-wrapper {
            margin-left: 0;
            padding-top: 15px;
            min-height: auto;
        }
    </style>
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content-wrapper">
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-3"></div>

                    <div class="col-md-6">
                        <div class="ibox">
                            <div class="ibox-body">
                                <div class="card">
                                    <div class="card-header text-center">Registro</div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="row mb-3">
                                                <label class="subtitle col-md-12">Datos personales</label>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-4 form-group">
                                                    <label for="ape_pat" class="col-form-label text-md-end">Apellido Paterno</label>

                                                    <div class="">
                                                        <input id="ape_pat" type="text" class="form-control @error('ape_pat') is-invalid @enderror" name="ape_pat" value="{{ old('ape_pat') }}" required autocomplete="name" autofocus>

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
                                                        <input id="ape_mat" type="text" class="form-control @error('ape_mat') is-invalid @enderror" name="ape_mat" value="{{ old('ape_mat') }}" required autocomplete="name" autofocus>

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
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                                <div class="col-sm-4 form-group">
                                                    <label for="telefono" class="col-form-label text-md-end">Teléfono 1</label>

                                                    <div class="">
                                                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="name" autofocus>

                                                        @error('telefono')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label for="telefono_opc" class="col-form-label text-md-end">Teléfono 2 (opcional)</label>

                                                    <div class="">
                                                        <input id="telefono_opc" type="number" class="form-control" name="telefono_opc" value="{{ old('telefono_opc') }}" autocomplete="name">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label for="email" class="col-form-label text-md-end">Correo electrónico</label>

                                                    <div class="">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-3 form-group">
                                                    <label for="tip_calle" class="col-form-label text-md-end">Tipo de calle</label>

                                                    <div class="">
                                                        <select type="select" id="tip_calle" class="form-control @error('tip_calle') is-invalid @enderror" name="tip_calle" value="{{ old('tip_calle') }}" required autocomplete="name" autofocus>
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

                                                <div class="col-sm-7 form-group">
                                                    <label for="nombre_calle" class="col-form-label text-md-end">Nombre</label>

                                                    <div class="">
                                                        <input id="nombre_calle" type="text" class="form-control @error('nombre_calle') is-invalid @enderror" name="nombre_calle" value="{{ old('nombre_calle') }}" required autocomplete="name" autofocus>

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
                                                        <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="name" autofocus>

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
                                                        <input id="urbanizacion" type="text" class="form-control @error('urbanizacion') is-invalid @enderror" name="urbanizacion" value="{{ old('urbanizacion') }}" required autofocus>

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
                                            
                                            <?php
                                                use App\Models\Department;

                                                $departamentos = Department::all();
                                            ?>

                                            <div class="row mb-3">
                                                <div class="col-sm-4 form-group">
                                                    <label for="departamento" class="col-form-label text-md-end">Departamento</label>

                                                    <div class="">
                                                        <select type="select" class="form-control  @error('departamento') is-invalid @enderror" name="departamento" required id="departamento">
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
                                                        <select type="select" class="form-control  @error('provincia') is-invalid @enderror" name="provincia" required id="provincia">
                                                            
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
                                                        <select type="select" class="form-control  @error('distrito') is-invalid @enderror" name="distrito" required id="distrito">
                                                        
                                                        </select>

                                                        @error('distrito')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-4 form-group">
                                                    <label for="dni" class="col-form-label text-md-end">Usuario (por defecto DNI) </label>

                                                    <div class="">
                                                        <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="name" autofocus>

                                                        @error('dni')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label for="password" class="col-form-label text-md-end">Contraseña</label>

                                                    <div class="">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label for="password-confirm" class="col-form-label text-md-end">Repetor Contraseña</label>

                                                    <div class="">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <button type="submit" class="btn btn-info col-md-12">
                                                    {{ __('REGISTRAR') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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