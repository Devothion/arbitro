@extends('layouts.app')

@section('title')
    Crear Proceso Arbitral
@endsection

@section('styles')
    <style>
        #form_empresa, #form_persona, #form_empresado, #form_personado {
            display: none;
        }
        .subtitle {
            font-weight: 700;
            font-size: 15px;
            color: #000;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th {
            border: none;
            padding: 0 10px;
        }
        .linea-borde {
            border: dashed 1px;
        }
        .fondo {
            background: #e6e7e8;
        }
        .dataTables_wrapper.container-fluid {
            padding-right: 0;
            padding-left: 0;
        }
        table tbody td select.form-control {
            width: 92%;
            margin: 9px 0;
            padding: 10px;
        }
        .modal-dialog {
            max-width: 1200px;
        }
        @media (max-width: 575px) {

        }
    </style>
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <div class="ibox">
        <div class="ibox-body">
            <h3 class="font-strong mb-0 mt-1 text-center text-success">REGISTRO NUEVO PROCESO ARBITRAL</h3>
        </div>

        <form method="POST" action="{{ route('procesos.store') }}" enctype="multipart/form-data">
            @csrf
        
            <div class="ibox-body fondo">
                <div class="row">
                    <div class="col-lg-12">
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
                            <label class="subtitle col-md-12 text-success">Datos Expediente</label>
                        </div>

                        <div class="row mb-3">
                            <input type="hidden" id="estado" name="estado" class="" value="1" />

                            <div class="col-sm-6 form-group">
                                <label for="proceso" class="col-form-label text-md-end">
                                    <input type="radio" id="regular" name="proceso" class="" value="regular" checked /> Proceso regular
                                </label>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="proceso" class="col-form-label text-md-end">
                                    <input type="radio" id="abreviado" name="proceso" class="" value="abreviado" /> Proceso abreviado
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="med_cau" class="col-md-12 col-form-label text-md-end">¿Tiene medida cautelar?</label>

                            <div class="col-sm-6 form-group">
                                <label for="pro_reg" class="col-form-label text-md-end">
                                    <input type="radio" id="si" name="med_cau" class="" value="si" checked /> Si
                                </label>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="pro_reg" class="col-form-label text-md-end">
                                    <input type="radio" id="no" name="med_cau" class="" value="no" /> No
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="linea-borde col-md-12"></div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-4 form-group">
                                <label for="cuantia" class="col-form-label text-md-end">Cuantía</label>

                                <div class="">
                                    <input id="cuantia" type="number" class="form-control @error('cuantia') is-invalid @enderror" name="cuantia" value="{{ old('cuantia') }}" autocomplete="cuantia" autofocus>

                                    @error('cuantia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="moneda" class="col-form-label text-md-end">Moneda</label>

                                <div class="">
                                    <label for="proceso" class="col-form-label text-md-end">
                                        <input type="radio" id="soles" name="moneda" class="" value="soles" checked /> Soles
                                    </label>

                                    <label for="proceso" class="col-form-label text-md-end">
                                        <input type="radio" id="dolares" name="moneda" class="" value="dolares" /> Dólares
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="name" class="col-form-label text-md-end"></label>

                                <div class="">
                                    <button class="btn btn-dafault col-md-12">Calcular</button>    
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <label for="descripcion" class="col-form-label text-md-end">Descripción de controversia</label>

                                <div class="">
                                    <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" autocomplete="descripcion" rows="5"></textarea>

                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ibox-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Tribunal Arbitral</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6 form-group">
                                <label for="proceso" class="col-form-label text-md-end">
                                    <input type="radio" id="completo" name="tribunal" class="" value="completo" checked /> Tribunal completo
                                </label>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="proceso" class="col-form-label text-md-end">
                                    <input type="radio" id="unico" name="tribunal" class="" value="unico" /> Árbitro único
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3" id="cont_tri">
                            <div class="col-md-12">
                                <label for="dni" class="col-form-label text-md-end">Buscar árbitro por nombre o DNI:</label>
                                
                                <div class="flexbox mb-4">
                                    <div class="flexbox">
                                        <div class="input-group-icon input-group-icon-left mr-3">
                                            {{-- <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                                            <input class="typeahead form-control form-control-solid" id="key-search" name="key-search" type="text" placeholder="Ejemplo: 42511900Z">
                                            <div id="countryList"></div> --}}


                                            <select class="form-control" id="key-search" name="key-search" data-show-subtext="true" data-live-search="true">
                                                <option selected>Selecciona</option>
                                                @foreach ($arbitros as $arbitro)
                                                    <option value="{{$arbitro->dni." - ".$arbitro->ape_pat." ".$arbitro->ape_mat." ".$arbitro->name}}">{{$arbitro->dni." - ".$arbitro->ape_pat." ".$arbitro->ape_mat." ".$arbitro->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <button type="button" name="add_tri" id="dynamic_tri" class="btn btn-success btn-air">DESIGNAR</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <ul id="shopping-list"></ul>
                                    <table class="table table-bordered table-hover" id="products-table">
                                        <thead class="thead-default thead-lg">
                                            <tr>
                                                <!--th>Arbitro</th -->
                                                <th>DNI</th>
                                                <th>Seleccionar parte</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody id="dynamicTribunal">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ibox-body fondo">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row mb-3">
                            <label class="subtitle col-md-12 text-success">Datos de demandante</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="flexbox mb-4">
                                    <div class="flexbox">
                                        <div class="input-group-icon input-group-icon-left mr-3">
                                            <select class="form-control" id="key-agregar" name="key-agregar" data-show-subtext="true" data-live-search="true">
                                                <option selected>Selecciona</option>
                                                @foreach ($empresas as $empresa)
                                                    <option value="{{$empresa->ruc." - ".$empresa->razon_social}}">{{$empresa->ruc." - ".$empresa->razon_social}}</option>
                                                @endforeach
                                            </select>

                                            <button type="button" name="add_tri" id="dynamic_agregar" class="btn btn-success btn-air">AGREGAR</button>

                                        </div>
                                    </div>
                                </div>

                                <a class="btn btn-info btn-air ml-2" data-toggle="modal" data-target="#nuevoDemandante" style="float:right;color: #fff;">REGISTRAR</a>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="demandante-table">
                                        <thead class="thead-default thead-lg">
                                            <tr>
                                                <th>Demandante</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody id="dynamicAgregar">
                                            @foreach($personas as $persona)
                                                @if($persona->registro == "1")
                                                    <tr>
                                                        <input id="id_demandante" type="hidden" class="form-control" name="id_demandante[]" value="{{ $persona->id }}">

                                                        <td>{{ $persona->name .' '. $persona->ape_pat .' '. $persona->ape_mat }}</td>
                                                        <td>{{ $persona->dni }}</td>

                                                        <td>
                                                            <a type="button" class="text-light mr-3 font-16 remove-demandantes">Eliminar</a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            @foreach($empresas as $empresa)
                                                @if($empresa->registro == "1")
                                                    <tr>
                                                        <input id="id_demandante" type="hidden" class="form-control" name="id_demandante[]" value="{{ $empresa->id }}">

                                                        <td>{{ $empresa->razon_social }}</td>
                                                        <td>{{ $empresa->ruc }}</td>

                                                        <td>
                                                            <a type="button" class="text-light mr-3 font-16 remove-demandantes">Eliminar</a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="subtitle col-md-12 text-danger">Datos de demandado</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="flexbox mb-4">
                                    <div class="flexbox">
                                        <div class="input-group-icon input-group-icon-left mr-3">
                                            <select class="form-control" id="key-demandado" name="key-demandado" data-show-subtext="true" data-live-search="true">
                                                <option selected>Selecciona</option>
                                                @foreach ($empresas as $empresa)
                                                    <option value="{{$empresa->ruc." - ".$empresa->razon_social}}">{{$empresa->ruc." - ".$empresa->razon_social}}</option>
                                                @endforeach
                                            </select>

                                            <button type="button" name="add_tri" id="dynamic_demandado" class="btn btn-success btn-air">AGREGAR</button>

                                        </div>
                                    </div>
                                </div>
            
                                <a class="btn btn-info btn-air ml-2" data-toggle="modal" data-target="#nuevoDemandado" style="float:right;color: #fff;">REGISTRAR</a>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="demandado-table">
                                        <thead class="thead-default thead-lg">
                                            <tr>
                                                <th>Demandado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody id="dynamicDemandado">
                                            @foreach($personas as $persona)
                                                @if($persona->registro == "2")
                                                    <tr>
                                                        <input id="id_demandado" type="hidden" class="form-control" name="id_demandado[]" value="{{ $persona->id }}">

                                                        <td>{{ $persona->name .' '. $persona->ape_pat .' '. $persona->ape_mat }}</td>
                                                        <td>{{ $persona->dni }}</td>

                                                        <td>
                                                            <a type="button" class="text-light mr-3 font-16 remove-demandados">Eliminar</a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            @foreach($empresas as $empresa)
                                                @if($empresa->registro == "3")
                                                    <tr>
                                                        <input id="id_demandado" type="hidden" class="form-control" name="id_demandado[]" value="{{ $empresa->id }}">

                                                        <td>{{ $empresa->razon_social }}</td>
                                                        <td>{{ $empresa->ruc }}</td>

                                                        <td>
                                                            <a type="button" class="text-light mr-3 font-16 remove-demandados">Eliminar</a>
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
            </div>

            <div class="ibox-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Aranceles o depósitos</label>
                        </div>

                        <div class="col-sm-12 form-group">
                            <table class="table" id="dynamicAranceles">
                                <tr>
                                    <td>
                                        <label for="numero_reg" class="col-form-label text-md-end">Monto</label>
                                        <input id="dep_monto" type="number" class="form-control" name="dep_monto[]">
                                    </td>

                                    <td>
                                        <label for="dep_fecha" class="col-form-label text-md-end">Fecha de depósito</label>
                                        <input id="dep_fecha" type="date" name="dep_fecha[]" class="form-control" />
                                    </td>

                                    <td>
                                        <label for="dep_file" class="col-form-label text-md-end">Adjuntar archivo</label>
                                        <input id="dep_file" type="file" name="dep_file[]" class="form-control" />
                                    </td>

                                    <td>
                                        <label for="dynamic_ara" class="col-form-label text-md-end"></label>
                                        <button type="button" name="add_ara" id="dynamic_ara" class="btn btn-success col-md-12">Agregar</button>
                                    </td>

                                    <td>
                                        <div class="">
                                            <span>*Puede agregar más de uno</span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Archivos adjuntos</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 dep_monto-group">
                                <label for="contrato" class="col-form-label text-md-end">Contrato</label>

                                <div class="">
                                    <input id="contrato" type="text" class="form-control @error('contrato') is-invalid @enderror" name="contrato" value="{{ old('contrato') }}" autocomplete="contrato" autofocus>

                                    @error('contrato')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="cla_arb" class="col-form-label text-md-end">Clausula arbitral</label>

                                <div class="">
                                    <input id="cla_arb" type="file" class="form-control @error('cla_arb') is-invalid @enderror" name="cla_arb" value="{{ old('cla_arb') }}" autocomplete="cla_arb">

                                    @error('cla_arb')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="subtitle col-md-12">Anexos / Otros documentos</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <table class="table" id="dynamicAnexos">
                                    <tr>
                                        <td>
                                            <label for="ane_nombre" class="col-form-label text-md-end">Nombre</label>
                                            <input type="text" name="ane_nombre[]" placeholder="Ejemplo: Anexo 1" class="form-control" />
                                        </td>

                                        <td>
                                            <label for="ane_doc" class="col-form-label text-md-end">Agregar documento</label>
                                            <input type="file" name="ane_doc[]" class="form-control" />
                                        </td>

                                        <td>
                                            <label for="dynamic_ane" class="col-form-label text-md-end"></label>
                                            <button type="button" name="add_ane" id="dynamic_ane" class="btn btn-success col-md-12">Agregar</button>
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
                            <label class="subtitle col-md-12">Observaciones (Opcional)</label>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <div class="">
                                    <textarea class="form-control" name="observaciones" id="observaciones" autocomplete="observaciones" rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <button type="submit" class="btn btn-info col-md-12">
                                {{ __('REGÍSTRAR') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="nuevoDemandante" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    @include('forms.demandante')
                </div>

                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>

    <div id="nuevoDemandado" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    @include('forms.demandado')
                </div>

                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Bucle tribunal arbitral -->
    <script>
        $( document ).ready(()=>{
            $( "#dynamic_tri" ).on( "click",()=>{
                $("#dynamicTribunal").append("<tr><td><p id='data_arb_dni' type='text' class='form-control' name='data_arb_dni[]'>" + $("#key-search").val() + "</p></td><td><select id='data_arb_parte' name='data_arb_parte[]' type='select' class='form-control'><option value=''>Seleccionar</option><option value='Unico'>Único</option><option value='Demandante'>Demandante</option><option value='Demandado'>Demandado</option></select><input id='data_arb_estado' type='hidden' class='form-control' name='data_arb_estado[]' value='Designado' /></td><td><a type='button' class='text-light mr-3 font-16 remove-demandantes'>Eliminar</a></td></tr>");
            });
            $( "#dynamic_agregar" ).on( "click",()=>{
                $("#dynamicAgregar").append("<tr><td><p id='data_arb_dni' type='text' class='form-control' name='data_arb_dni[]'>" + $("#key-agregar").val() + "</p></td><td><a type='button' class='text-light mr-3 font-16 remove-demandantes'>Eliminar</a></td></tr>");
            });
            $( "#dynamic_demandado" ).on( "click",()=>{
                $("#dynamicDemandado").append("<tr><td><p id='data_arb_dni' type='text' class='form-control' name='data_arb_dni[]'>" + $("#key-demandado").val() + "</p></td><td><a type='button' class='text-light mr-3 font-16 remove-demandantes'>Eliminar</a></td></tr>");
            });
        })
    </script>

    <!-- Buscador dni arbitral y table arbitral -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#key-search').keyup(function(){ 
                var query = $(this).val(); 
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('autocomplete') }}",
                        method:"POST",
                        data:{query:query, _token:_token},
                        success:function(data){
                        $('#countryList').fadeIn();  
                            $('#countryList').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function(){  
                $('#key-search').val($(this).text());  
                $('#countryList').fadeOut();  
            });  
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script type="text/javascript">
        var i = 0;
        $(document).on('click', '.remove-demandados', function () {
            $(this).parents('tr').remove();
        });
    </script>

    <script type="text/javascript">
        var i = 0;
        $(document).on('click', '.remove-demandantes', function () {
            $(this).parents('tr').remove();
        });
    </script>

    <script type="text/javascript">
        var i = 0;
        $("#dynamic_ane").click(function () {
            ++i;
            $("#dynamicAnexos").append('<tr><td><input type="text" name="ane_nombre[]" placeholder="Ejemplo: Anexo 1" class="form-control" /></td><td><input type="file" name="ane_doc[]" class="form-control" /></td><td><button type="button" class="col-md-12 btn btn-danger remove-input-anexo">Eliminar</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-input-anexo', function () {
            $(this).parents('tr').remove();
        });
    </script>

    <script type="text/javascript">
        var i = 0;
        $("#dynamic_ara").click(function () {
            ++i;
            $("#dynamicAranceles").append('<tr><td><input id="dep_monto" type="number" class="form-control" name="dep_monto[]"></td><td><input type="date" name="dep_fecha[]" class="form-control" /></td><td><input type="file" name="dep_file[]" class="form-control" /></td><td><button type="button" class="col-md-12 btn btn-danger remove-input-aranceles">Eliminar</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-input-aranceles', function () {
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
