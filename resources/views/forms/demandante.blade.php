<div class="ibox">
    <div class="ibox-body">
        <h3 class="font-strong mb-0 mt-1">REGISTRO</h3>

        <p>(Registre una cuenta como parte: demandante / demandado)</p>

        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-3">
                    <div class="col-sm-6 form-group">
                        <label for="registrote" class="col-form-label text-md-end">
                            <input type="radio" id="empresa" name="registrote" class="registrote" value="empresa" /> EMPRESA
                        </label>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="registrote" class="col-form-label text-md-end">
                            <input type="radio" id="persona" name="registrote" class="registrote" value="persona" /> PERSONA NATURAL
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{ route('empresas.store') }}" enctype="multipart/form-data" id="form_empresa">
                    @csrf

                    <input type="hidden" id="registro" name="registro" value="1" />

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
                        <div class="col-sm-4 form-group">
                            <label for="telefono" class="col-form-label text-md-end">Teléfono</label>

                            <div class="">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" autocomplete="name" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="email" class="col-form-label text-md-end">Email</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="email_opc" class="col-form-label text-md-end">Email</label>

                            <div class="">
                                <input id="email_opc" type="email_opc" class="form-control @error('email_opc') is-invalid @enderror" name="email_opc" value="{{ old('email_opc') }}" autocomplete="email_opc">

                                @error('email_opc')
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
                        <div class="col-sm-4 dep_monto-group">
                            <div class="">
                                <a class="btn btn-info text-white" id="bot_rep" name="bot_rep">
                                    {{ __('AGREGAR REPRESENTANTE') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="subtitle col-md-12">Documentos</label>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 form-group">
                            <label for="representante" class="col-form-label text-md-end">Vigencia de poder o carta poder</label>

                            <div class="">
                                <input id="representante" type="file" class="form-control @error('representante') is-invalid @enderror" name="representante" value="{{ old('representante') }}" autocomplete="representante">

                                @error('representante')
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

                <form method="POST" action="{{ route('personas.store') }}" enctype="multipart/form-data" id="form_persona">
                    @csrf

                    <input type="hidden" id="registro" name="registro" value="1" />

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
                        <div class="col-sm-6 form-group">
                            <label for="telefono" class="col-form-label text-md-end">Teléfono</label>

                            <div class="">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" autocomplete="name" autofocus>

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
                        <label class="subtitle col-md-12">Documentos</label>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 form-group">
                            <label for="representante" class="col-form-label text-md-end">Vigencia de poder o carta poder</label>

                            <div class="">
                                <input id="representante" type="file" class="form-control @error('representante') is-invalid @enderror" name="representante" value="{{ old('representante') }}" autocomplete="representante">

                                @error('representante')
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