<div class="modal-footer">
    <div class="col-lg-12">
        <div class="row mb-3">
            <label class="subtitle col-md-12">Datos personales</label>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12 form-group">
                <label for="ape_pat" class="col-form-label text-md-end">DNI</label>

                <div class="">
                    <input id="dni" type="number" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $persona->dni }}" autocomplete="name" autofocus disabled>
                </div>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-sm-4 form-group">
                <label for="ape_pat" class="col-form-label text-md-end">Apellido Paterno</label>

                <div class="">
                    <input id="ape_pat" type="text" class="form-control @error('ape_pat') is-invalid @enderror" name="ape_pat" value="{{ $persona->ape_pat }}" autocomplete="name" autofocus disabled>
                </div>
            </div>

            <div class="col-sm-4 form-group">
                <label for="ape_mat" class="col-form-label text-md-end">Apellido Materno</label>

                <div class="">
                    <input id="ape_mat" type="text" class="form-control @error('ape_mat') is-invalid @enderror" name="ape_mat" value="{{ $persona->ape_mat }}" autocomplete="name" autofocus disabled>
                </div>
            </div>

            <div class="col-sm-4 form-group">
                <label for="name" class="col-form-label text-md-end">Nombre(s)</label>

                <div class="">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $persona->name }}" autocomplete="name" autofocus disabled>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-2 form-group">
                <label for="tip_calle" class="col-form-label text-md-end">Tipo de calle</label>

                <div class="">
                    <select type="select" id="tip_calle" class="form-control @error('tip_calle') is-invalid @enderror" name="tip_calle" value="{{ $persona->tip_calle }}" autocomplete="name" autofocus disabled>
                        <option value="{{ $persona->tip_calle }}">{{ $persona->tip_calle }}</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-8 form-group">
                <label for="nombre_calle" class="col-form-label text-md-end">Nombre</label>

                <div class="">
                    <input id="nombre_calle" type="text" class="form-control @error('nombre_calle') is-invalid @enderror" name="nombre_calle" value="{{ $persona->nombre_calle }}" autocomplete="name" autofocus disabled>
                </div>
            </div>

            <div class="col-sm-2 form-group">
                <label for="numero" class="col-form-label text-md-end">Número</label>

                <div class="">
                    <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ $persona->numero }}" autocomplete="name" autofocus disabled>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-6 form-group">
                <label for="urbanizacion" class="col-form-label text-md-end">Urbanización, Grupo residencial, otro</label>

                <div class="">
                    <input id="urbanizacion" type="text" class="form-control @error('urbanizacion') is-invalid @enderror" name="urbanizacion" value="{{ $persona->urbanizacion }}" autocomplete="name" autofocus disabled>
                </div>
            </div>

            <div class="col-sm-6 form-group">
                <label for="referencia" class="col-form-label text-md-end">Referencia</label>

                <div class="">
                    <input id="referencia" type="text" class="form-control @error('referencia') is-invalid @enderror" name="referencia" value="{{ $persona->referencia }}" autofocus disabled>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4 form-group">
                <label for="departamento" class="col-form-label text-md-end">Departamento</label>

                <div class="">
                    <select type="select" class="form-control  @error('departamento') is-invalid @enderror" name="departamento" id="departamento" disabled disabled>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->departamento }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-4 form-group">
                <label for="provincia" class="col-form-label text-md-end">Provincia</label>

                <div class="">
                    <select type="select" class="form-control  @error('provincia') is-invalid @enderror" name="provincia" id="provincia" disabled disabled>
                        @foreach($provincias as $provincia)
                            <option value="{{ $provincia->id }}">{{ $provincia->provincia }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-4 form-group">
                <label for="distrito" class="col-form-label text-md-end">Distrito</label>

                <div class="">
                    <select type="select" class="form-control  @error('distrito') is-invalid @enderror" name="distrito" id="distrito" disabled disabled>
                        @foreach($distritos as $distrito)
                            <option value="{{ $distrito->id }}">{{ $distrito->distrito }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>  
    </div>
</div>