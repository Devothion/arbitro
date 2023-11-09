<div class="modal-footer">
    <div class="col-lg-12">
        <div class="row mb-3">
            <label class="subtitle col-md-12">Datos de la empresa</label>
        </div>

        <div class="row mb-3">
            <div class="col-sm-6 form-group">
                <label for="ruc" class="col-form-label text-md-end">RUC</label>

                <div class="">
                    <input id="ruc" type="number" class="form-control" name="ruc" value="{{ $empresa->ruc }}" disabled>
                </div>
            </div>

            <div class="col-sm-6 form-group">
                <label for="razon_social" class="col-form-label text-md-end">Razón social</label>

                <div class="">
                    <input id="razon_social" type="text" class="form-control" name="razon_social" value="{{ $empresa->razon_social }}" disabled>
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
                    <select type="select" id="tip_calle" class="form-control @error('tip_calle') is-invalid @enderror" name="tip_calle" value="{{ $empresa->tip_calle }}" autocomplete="name" autofocus disabled>
                        <option value="{{ $empresa->tip_calle }}">{{ $empresa->tip_calle }}</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-8 form-group">
                <label for="nombre_calle" class="col-form-label text-md-end">Nombre</label>

                <div class="">
                    <input id="nombre_calle" type="text" class="form-control @error('nombre_calle') is-invalid @enderror" name="nombre_calle" value="{{ $empresa->nombre_calle }}" autocomplete="name" autofocus disabled>
                </div>
            </div>

            <div class="col-sm-2 form-group">
                <label for="numero" class="col-form-label text-md-end">Número</label>

                <div class="">
                    <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ $empresa->numero }}" autocomplete="name" autofocus disabled>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-6 form-group">
                <label for="urbanizacion" class="col-form-label text-md-end">Urbanización, Grupo residencial, otro</label>

                <div class="">
                    <input id="urbanizacion" type="text" class="form-control @error('urbanizacion') is-invalid @enderror" name="urbanizacion" value="{{ $empresa->urbanizacion }}" autocomplete="name" autofocus disabled>
                </div>
            </div>

            <div class="col-sm-6 form-group">
                <label for="referencia" class="col-form-label text-md-end">Referencia</label>

                <div class="">
                    <input id="referencia" type="text" class="form-control @error('referencia') is-invalid @enderror" name="referencia" value="{{ $empresa->referencia }}" autofocus disabled>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4 form-group">
                <label for="departamento" class="col-form-label text-md-end">Departamento</label>

                <div class="">
                    <select type="select" class="form-control  @error('departamento') is-invalid @enderror" name="departamento" id="departamento" disabled>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->departamento }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-4 form-group">
                <label for="provincia" class="col-form-label text-md-end">Provincia</label>

                <div class="">
                    <select type="select" class="form-control  @error('provincia') is-invalid @enderror" name="provincia" id="provincia" disabled>
                        @foreach($provincias as $provincia)
                            <option value="{{ $provincia->id }}">{{ $provincia->provincia }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-4 form-group">
                <label for="distrito" class="col-form-label text-md-end">Distrito</label>

                <div class="">
                    <select type="select" class="form-control  @error('distrito') is-invalid @enderror" name="distrito" id="distrito" disabled>
                        @foreach($distritos as $distrito)
                            <option value="{{ $distrito->id }}">{{ $distrito->distrito }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>