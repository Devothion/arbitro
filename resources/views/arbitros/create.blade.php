@extends('layouts.app')

@section('title')
    Crear Árbitro
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
    @include('arbitros.form')
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
