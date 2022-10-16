<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/animate.css') }}"/>

    {{-- Flatpickr --}}
    <link rel="stylesheet" href="{{ asset('plugins/flatpickr/flatpickr.min.css') }}">
    <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>

    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">

    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <style type="text/css">

        .app-main {
            min-height: 93vh;
        }

        .footer {
            padding: 0;
        }

    </style>

</head>
<body>

    <div id="app">

        @include ('partials._nav')
        
        
        <section class="app-main">
            <div class="container is-fluid is-marginless app-content">
                @yield('content')
            </div>
        </section>
          

        <footer class="footer">
            <div class="container">
                <div class="content has-text-centered">
                    <p><span class="icon"><i class="fa fa-code"></i></span> with <span class="icon"><i class="fa fa-heart"></i></span> by <a href="mailto::kodak@gmail.com">Kodak</a> - Copyright <a href="#">2022</a></p>
                </div>
            </div>
        </footer>      

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Datatables --}}
    <script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>

    {{-- Select2 --}}
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>