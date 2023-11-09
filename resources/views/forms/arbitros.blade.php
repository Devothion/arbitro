<div class="ibox">
    <div class="ibox-body">
        <h3 class="font-strong mb-0 mt-1 text-center text-success">REGISTRO NUEVO ÁRBITRO</h3>

        <div class="row">
            <div class="col-lg-12">
                <form method="POST" enctype="multipart/form-data" id="addArbitroForm">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-sm-12 form-group">
                            @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <p style="margin-bottom: 0;">{{ Session::get('success') }}</p>
                                </div>
                            @endif

                            <div class="errMsgContainer"></div>
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
                        <div class="col-sm-6 form-group">
                            <label for="telefono" class="col-form-label text-md-end">Teléfono</label>

                            <div class="">
                                <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" autocomplete="name" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="email" class="col-form-label text-md-end">Correo electrónico</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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

                    <div class="row mb-3">
                        <label class="subtitle col-md-12">Registro nacional de árbitros</label>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 form-group">
                            <label for="numero_reg" class="col-form-label text-md-end">Número</label>

                            <div class="">
                                <input id="numero_reg" type="text" class="form-control @error('numero_reg') is-invalid @enderror" name="numero_reg" value="{{ old('numero_reg') }}" autocomplete="numero_reg" autofocus>

                                @error('numero_reg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                        <input type="text" id="profesion" name="profesion[]" placeholder="Ejemplo: Abogado" class="form-control" />
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
                                        <input type="text" id="especialidad" name="especialidad[]" placeholder="Ejemplo: Maestría derecho civil" class="form-control" />
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
                            </table>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <button type="button" class="btn btn-info col-md-12 add_arbitro" name="add_arbitro" id="add_arbitro">
                            {{ __('REGÍSTRAR') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>