<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Árbitrios</title>

    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/line-awesome/css/line-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/toastr/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/dataTables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    @yield('styles')

    <style>
        .content-wrapper {
            min-height: auto !important;
        }
        .page-wrapper {
            position: initial !important;
        }
    </style>
</head>
<body>
    <div id="app">
        @guest
            @yield('content')
        @else
            <div class="page-wrapper">
                @include('partials.nav')

                @include('partials.sidebar')

                <div class="content-wrapper">
                    <div class="page-content fade-in-up">
                        @yield('content')
                    </div>
                </div>
            </div>
        @endguest
    </div>

    <div class="sidenav-backdrop backdrop"></div>

    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/metisMenu/dist/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-idletimer/dist/idle-timer.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/dataTables/datatables.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    @yield('scripts')
</body>
</html>
