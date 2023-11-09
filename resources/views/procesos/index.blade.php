@extends('layouts.app')

@section('title')
    Procesos
@endsection

@section('styles')
    <style>
        .btn-refresh {
            
        }
        @media (max-width: 575px) {

        }
    </style>
@endsection

@section('content')
    <div class="ibox">
        <div class="ibox-body">
            <h5 class="font-strong mb-4">ADMINISTRADOR / DEMANDANTE Y DEMANDADO</h5>

            <div class="flexbox mb-4">
                <div class="flexbox">
                    <div class="input-group-icon input-group-icon-left mr-3">
                        <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                        <input class="form-control form-control-solid" id="key-search" type="text" placeholder="Buscar...">
                    </div>
                </div>

                <a class="btn btn-success btn-air ml-2" href="{{ url('procesos/create') }}">NUEVO PROCESO</a>
            </div>

            <div class="table-responsive row">
                <table class="table table-bordered table-hover" id="products-table">
                    <thead class="thead-default thead-lg">
                        <tr>
                            <th>N° Expediente</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($procesos as $proceso)
                            <tr>
                                <td>PA-CAJ-2023-00{{ $proceso->id }}</td>
                                <td>En calificación</td>

                                <td>
                                    <a class="text-light mr-3 font-16" href="{{ route('procesos.show', $proceso->id) }}">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#products-table').DataTable({
                pageLength: 10,
                fixedHeader: true,
                responsive: true,
                "sDom": 'rtip',
            });
            var table = $('#products-table').DataTable();
            $('#key-search').on('keyup', function() {
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                table.column(2).search($(this).val()).draw();
            });
        });
    </script>
@endsection
