@extends('layouts.shipment')

@section('content')
  <div class="loading-image">
    <img src="{{ asset('img/eclipse.svg') }}">
  </div>

  <section>
    <div class="truckDetails">
      @include ('partials._truckDetails')
    </div>

    <div class="shipmentForm">
      @include ('partials._shipmentForm')
    </div>

    <div class="shipmentDetails">
      @include ('partials._shipmentDetails')
    </div>

    <div class="errorAlert">
      @include ('partials._error')
    </div>
  </section>

  <div class="lockscreen-wrapper">
    
    <div class="shipment">

      <div class="lockscreen-logo">
        <a href="{{ route('home') }}"><b>Fleet</b>Dash</a>
      </div>
      <!-- User name -->
      <div class="lockscreen-name">{{ Auth::user()->name }}</div>

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="{{ asset('img/default.png') }}" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" action="{{ route('truck.get', '') }}" id="barcode-form">
          <div class="input-group">
            <input type="password" class="form-control" placeholder="barcode" value="" id="truck-barcode">
            {{-- 13040266 --}}

            <div class="input-group-btn">
              <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
            </div>
          </div>
        </form>
        <!-- /.lockscreen credentials -->

      </div>
      <!-- /.lockscreen-item -->
      <div class="help-block text-center">
        Scan Truck to Begin
      </div>
      <div class="text-center">
        <a class="button is-text" href="{{ route('logout') }}" style="margin:0.5em" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>

        <a class="button is-text" title="View My Shipments" href="{{ route('shipment.list') }}" style="margin:0.5em">
          Shipments
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </div>

    </div>

  </div>

  <div class="app-main" style="min-height: 30vh"></div>

@endsection