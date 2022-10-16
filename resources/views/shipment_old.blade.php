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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/animate.css') }}"/>

    <!-- Bulma Version 0.6.0 -->
    {{-- <link rel="stylesheet" href="{{ asset('css/bulma/bulma.css') }}"/> --}}

    {{-- Flatpickr --}}
    <link rel="stylesheet" href="{{ asset('plugins/flatpickr/flatpickr.min.css') }}">
    <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <style type="text/css">

        .app-main, .footer {
            margin: 0;
        }

        .app-main {
            min-height: 93vh;
        }

        .footer {
            padding: 0;
        }

        .truckDetails, .shipmentForm {
          display: none
        }

    </style>

</head>
<body>

    <div id="app">

        
        <div class="nprogress-container"></div>
          <section class="hero is-bold app-navbar animated slideInDown">
              <div class="hero-head">
              
                  <nav class="nav is-transparent">
                      <div class="nav-left"><a class="nav-item is-hidden"><i aria-hidden="true" class="fa fa-bars"></i></a></div>
                      <div class="nav-center">
                          <a href="#" class="nav-item hero-brand"><img src="{{ asset('img/logo.png') }}" alt="Vue Admin Panel Framework">
                              <div aria-label="Admin" class="is-hidden-mobile tooltip_ tooltip--right tooltip--success tooltip--small tooltip--rounded tooltip--always tooltip--no-animate"><span class="vue">Fleet</span><strong class="admin">Dash</strong></div>
                          </a>
                      </div>
                      <div class="nav-right is-flex">
                        <a class="button is-text" href="{{ route('logout') }}" style="margin:0.5em" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                      </div>
                  </nav>
              </div>
        </section>

        <section class="app-main">
            <div class="barcodeForm">
              <form action="{{ route('truck.get', '') }}" id="barcode-form">
                <div class="control">
                  <input class="input" type="text" placeholder="Scan Truck To Start" id="truck-barcode">
                </div>
              </form>
            </div>

            <div class="truckDetails">
              @include ('partials._truckDetails')
            </div>

            <div class="shipmentForm">
              @include ('partials._shipmentForm')
            </div>

        </section>
          
        <footer class="footer">
            <div class="container">
                <div class="content has-text-centered">
                    <p><span class="icon"><i class="fa fa-code"></i></span> with <span class="icon"><i class="fa fa-heart"></i></span> by <a href="mailto::my57ere@gmail.com">my57ere</a> - Copyright <a href="#">2017</a></p>
                </div>
            </div>
        </footer>        

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>