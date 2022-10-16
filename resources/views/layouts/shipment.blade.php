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

    {{-- Boostrap --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">

    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">

    {{-- Flatpickr --}}
    <link rel="stylesheet" href="{{ asset('plugins/flatpickr/flatpickr.min.css') }}">
    <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>

    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"> --}}

    <style type="text/css">

        .lockscreen {
          background: #d2d6de;
        }

        body {
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
            font-weight: 400;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .app-main, .footer {
            margin: 0;
        }

        .app-main {
            min-height: 30vh;
        }

        .footer {
            padding: 0;
        }

        .truckDetails, .shipmentForm, .shipmentDetails, .errorAlert {
          display: none
        }

        .lockscreen-wrapper, {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 10%;
        }

        .lockscreen-logo {
            font-size: 35px;
            text-align: center;
            margin-bottom: 25px;
            font-weight: 300;
        }

        .lockscreen-logo a {
            color: #444;
            text-decoration: none;
        }

        .lockscreen .lockscreen-name {
            text-align: center;
            font-weight: 600;
        }

        .lockscreen-item {
            border-radius: 4px;
            padding: 0;
            background: #fff;
            position: relative;
            margin: 10px auto 30px auto;
            width: 290px;
        }

        .lockscreen-image {
            border-radius: 50%;
            position: absolute;
            left: -10px;
            top: -25px;
            background: #fff;
            padding: 5px;
            z-index: 10;
        }

        .lockscreen-image>img {
            border-radius: 50%;
            width: 70px;
            height: 70px;
        }

        .lockscreen-credentials {
            margin-left: 70px;
        }

        .input-group {
            position: relative;
            display: table;
            border-collapse: separate;
        }

        .input-group-btn {
            position: relative;
            font-size: 0;
            white-space: nowrap;
        }

        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
            color: #737373;
        }

        .text-center {
            text-align: center;
        }

        .lockscreen-footer {
            margin-top: 10px;
        }

        .lockscreen-credentials .form-control {
            border: 0;
        }

        .lockscreen-credentials .btn {
            background-color: #fff;
            border: 0;
            padding: 0 10px;
        }

        .form-control {
            border-radius: 0;
            box-shadow: none;
            border-color: #d2d6de;
        }

        .input-group .form-control:focus {
            z-index: 3;
            box-shadow: none;
        }

        .shipment {
          display: block;
          margin-top: 30vh;
        }

        .loading-image {
          position: relative;
          top: 45vh;
          left: 93%;
          transform: translate(-50%, -50%);
          display: none;
        }

    </style>

    <!-- Bulma Version 0.6.0 -->
    {{-- <link rel="stylesheet" href="{{ asset('css/bulma/bulma.css') }}"/> --}}

</head>


<body class="lockscreen">

  @yield('content')

  <div class="lockscreen-footer text-center">
    <p><span class="icon" style="color: #F00"><i class="fa fa-code"></i></span> with <span class="icon" style="color: #F00"><i class="fa fa-heart"></i></span> by <a href="mailto::kodak@gmail.com">Kodak</a> - Copyright <a href="#">2022</a></p>
  </div>

</body>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

{{-- Datatables --}}
<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>

{{-- Select2 --}}
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>

<script src="{{ asset('js/dashboard.js') }}"></script>

</html>