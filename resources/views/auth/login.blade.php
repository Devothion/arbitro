@extends('layouts.app')

@section('title')
    Iniciar Sesión
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
            padding-top: 170px;
            min-height: auto;
        }
    </style>
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content-wrapper">
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-4"></div>

                    <div class="col-md-4">
                        <div class="ibox">
                            <div class="ibox-body">
                                <div class="card">
                                    <div class="card-header text-center">Inicio de sesión</div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="row mb-3">
                                                <div class="col-sm-12 form-group">
                                                    <label for="dni" class="col-form-label text-md-end">Usuario</label>

                                                    <div class="">
                                                        <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autofocus>

                                                        @error('dni')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-12 form-group">
                                                    <label for="password" class="col-form-label text-md-end">Contraseña</label>

                                                    <div class="">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <button type="submit" class="btn btn-info col-md-12">
                                                    Iniciar
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