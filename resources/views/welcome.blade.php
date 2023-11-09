@extends('layouts.app')

@section('content')
    <script>
        window.location.href = "{{ url('/login') }}";
    </script>
@endsection
