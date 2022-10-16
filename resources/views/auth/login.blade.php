<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

        <!-- Bulma Version 0.6.0 -->
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css" integrity="sha256-HEtF7HLJZSC3Le1HcsWbz1hDYFPZCqDhZa9QsCgVUdw=" crossorigin="anonymous" /> --}}
        <link rel="stylesheet" href="{{ asset('css/bulma/bulma.css') }}"/>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .hero.is-success {
              background: #F2F6FA;
            }

            .hero .nav, .hero.is-success .nav {
              -webkit-box-shadow: none;
              box-shadow: none;
            }

            .box {
              margin-top: 5rem;
            }
            .avatar {
              margin-top: -70px;
              padding-bottom: 20px;
            }
            .avatar img {
              width: 45%;
              padding: 5px;
              background: #fff;
              border-radius: 50%;
              -webkit-box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
              box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
            }
            input {
              font-weight: 300;
            }
            p {
              font-weight: 700;
            }
            p.subtitle {
              padding-top: 1rem;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

      <section class="hero is-success is-fullheight">

        <div class="hero-body">

          <div class="container has-text-centered">

            <div class="column is-4 is-offset-4">

              <h3 class="title has-text-grey">Login</h3>
              {{-- style="background-color: red;" --}}
              <p class="subtitle has-text-grey" >Please login to proceed.</p>

              <div class="box">
                <figure class="avatar">
                  {{-- <img src="https://placehold.it/128x128"> --}}
                  <img src="{{ asset('img/default.png') }}">
                </figure>

                <form class="form-horizontal" method="POST" action="{{ route('login') }}">

                  {{ csrf_field() }}

                  <div class="field">
                    <div class="control has-icons-left{{ $errors->has('email') ? ' has-icons-right' : '' }}">
                      <input class="input is-large{{ $errors->has('email') ? ' is-danger' : '' }}" value="{{ old('email') }}" type="email" name="email" placeholder="Email input" required autofocus>
                      <span class="icon is-small is-left">
                        <i class="fa fa-envelope"></i>
                      </span>
                      @if ($errors->has('email'))
                          <span class="icon is-small is-right">
                            <i class="fa fa-warning"></i>
                          </span>
                      @endif
                    </div>
                    @if ($errors->has('email'))
                      <p class="help is-danger">{{ $errors->first('email') }}</p>
                    @endif
                  </div>

                  <div class="field">
                    <div class="control has-icons-left{{ $errors->has('password') ? ' has-icons-right' : '' }}">
                      <input class="input is-large{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="Your Password" name="password" required>
                      <span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                      </span>
                      @if ($errors->has('password'))
                          <span class="icon is-small is-right">
                            <i class="fa fa-warning"></i>
                          </span>
                      @endif
                    </div>
                    @if ($errors->has('password'))
                      <p class="help is-danger">{{ $errors->first('password') }}</p>
                    @endif
                  </div>

                  <div class="field">
                    <label class="checkbox">
                      {{-- <input type="checkbox"> --}}
                      Fleet
                    </label>
                  </div>

                  {{-- <a class="button is-block is-info is-large">Login</a> --}}

                  {{-- <input type="submit" name="login" value="Login" class="button is-block is-info is-large"> --}}

                  {{-- <button type="submit" class="button is-block is-info is-large">
                      Login
                  </button> --}}

                  <button type="submit" class="button is-default is-large is-fullwidth">Login</button>

                </form>

              </div>

              <p class="has-text-grey">
                <a href="{{ url('/register') }}">Sign Up</a> &nbsp;·&nbsp;
                <a href="{{ route('password.request') }}">Forgot Password</a> &nbsp;·&nbsp;
                <a href="">Need Help?</a>
              </p>

            </div>

          </div>

        </div>

      </section>

    </body>
    {{-- <script async type="text/javascript">
      (function() {
          var burger = document.querySelector('.nav-toggle');
          var menu = document.querySelector('.nav-menu');
          burger.addEventListener('click', function() {
              burger.classList.toggle('is-active');
              menu.classList.toggle('is-active');
          });
      })();
    </script> --}}
</html>




<body>
  
</body>
