@extends('layouts.app')

@section('title')
    Persona Natural
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
            <h5 class="font-strong mb-4">PERSONA NATURAL</h5>

            <div class="flexbox mb-4">
                <div class="flexbox">
                    <div class="input-group-icon input-group-icon-left mr-3">
                        <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                        <input class="form-control form-control-solid" id="key-search" type="text" placeholder="Buscar...">
                    </div>
                </div>

                <a class="btn btn-success btn-air ml-2" href="{{ url('personas/create') }}">NUEVA PERSONA NATURAL</a>
            </div>

            <div class="table-responsive row">
                <table class="table table-bordered table-hover" id="products-table">
                    <thead class="thead-default thead-lg">
                        <tr>
                            <th>ID</th>
                            <th>DNI</th>
                            <th>Apellidos y Nombres</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($personas as $persona)
                            @if($persona->registro == "2")
                                <tr>
                                    <td>{{ $persona->id }}</td>
                                    <td>{{ $persona->dni }}</td>
                                    <td>{{ $persona->name }} {{ $persona->ape_pat }} {{ $persona->ape_mat }}</td>

                                    <td>
                                        <a class="text-light mr-3 font-16" href="{{ route('personas.show', $persona->id) }}">Ver</a>
                                        
                                        <a class="text-light mr-3 font-16" href="{{ route('personas.edit', $persona->id) }}">Editar</a>
                                    </td>
                                </tr>
                            @endif
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
