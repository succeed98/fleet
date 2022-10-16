<div class="nprogress-container"></div>
  <section class="hero is-bold app-navbar animated slideInDown">
      <div class="hero-head">
      
          <nav class="nav is-transparent">
              <div class="nav-left"><a class="nav-item is-hidden-tablet"><i aria-hidden="true" class="fa fa-bars"></i></a></div>
              <div class="nav-center">
                  <a href="#" class="nav-item hero-brand"><img src="{{ asset('img/logo.png') }}" alt="Vue Admin Panel Framework">
                      <div aria-label="Admin" class="is-hidden-mobile tooltip_ tooltip--right tooltip--success tooltip--small tooltip--rounded tooltip--always tooltip--no-animate"><span class="vue">Fleet</span><strong class="admin">Dash</strong></div>
                  </a>
              </div>
              <div class="nav-right is-flex">
                {{-- <a class="button is-loading" style="margin-top:0.5em">Loading</a> --}}
                <a class="button is-text is-primary" href="{{ route('shipment') }}" style="margin:0.5em">
                  Scanner
                </a>
                <a class="button is-text is-danger" href="{{ route('alerts') }}" style="margin:0.5em">
                  Alerts
                </a>
                <a class="button is-text is-warning" href="{{ route('accounts.index') }}" style="margin:0.5em">
                  Accounts
                </a>
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

  <aside class="menu app-sidebar animated slideInLeft">
      <p class="menu-label">
          General
      </p>
      <ul class="menu-list">

          <li>
            <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'is-active' : '' }}" aria-expanded="false"><span class="icon is-small"><i class="fa fa-tachometer"></i></span>
            Dashboard
            </a>
              
          </li>

          <li>
            <a href="" class="droppy" aria-expanded="false"><span class="icon is-small"><i class="fa fa-bar-chart-o"></i></span>
              Admin
              <span class="icon is-small is-angle"><i class="fa fa-angle-down"></i></span></a>
              <ul style="display: none;">
                  <li><a href="{{ route('trucks.index') }}" class="">Trucks</a></li>
                  <li><a href="{{ route('drivers.index') }}" class="">Drivers</a></li>
                  <li><a href="{{ route('companies.index') }}" class="">Companies</a></li>
                  <li><a href="{{ route('sites.index') }}" class="">Sites</a></li>
              </ul>
          </li>

          <li>
            <a href="{{ route('app.settings') }}" class="{{ Request::is('settings') ? 'is-active' : '' }}" aria-expanded="false"><span class="icon is-small"><i class="fa fa-cog"></i></span>
              Settings
            </a>
              
          </li>


      </ul>
  </aside>