@extends('layouts.app')

@section('content')
  {{-- breadcrumbs --}}
  <nav class="level app-levelbar">
      <div class="level-left">
          <div class="level-item">
              <h3 class="subtitle is-5"><strong>Trucks</strong></h3>
            </div>
          <div class="level-item">
            <span aria-label="Trucks" class="icon tooltip tooltip--right tooltip--small tooltip--rounded">
              <a href="{{ route('trucks.index') }}"><i class="fa fa-truck" aria-hidden="true"></i></a>
            </span>
          </div>
      </div>
      <div class="level-right is-hidden-mobile">
          <ol class="breadcrumb">
              <li><a href="{{ route('trucks.index') }}" class="is-active">Trucks</a></li>
              <li><span class="active">Add</span></li>
          </ol>
      </div>
  </nav>

  @if(session()->has('success'))
    <div class="notification is-success">
      <button class="delete"></button>
        {{ session()->get('success') }}
    </div>
  @endif

  <div>

    <div class="tile is-parent">
        <article class="tile is-child box">
          <h1 class="title">Add New Truck</h1>
          <h2 class="subtitle">Fill in the form to add a new truck</h2>
          <form role="form" method="POST" action="{{ route('trucks.store') }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="columns">

              <div class="column">

                <div class="control">
                  <label class="label">Make</label>
                  <input class="input {{ $errors->has('make') ? ' is-danger' : '' }}" value="{{ old('make') }}" type="text" placeholder="Enter Make" name="make" autofocus>
                  @if ($errors->has('make'))
                    <p class="help is-danger">{{ $errors->first('make') }}</p>
                  @endif
                </div>
                
                <div class="control">
                  <label class="label">Model</label>
                  <input class="input {{ $errors->has('model') ? ' is-danger' : '' }}" value="{{ old('model') }}" type="text" placeholder="Enter Model" name="model">
                  @if ($errors->has('model'))
                    <p class="help is-danger">{{ $errors->first('model') }}</p>
                  @endif
                </div>

                <div class="control">
                  <label class="label">Color</label>
                  <input class="input {{ $errors->has('color') ? ' is-danger' : '' }}" value="{{ old('color') }}" type="text" placeholder="Enter Color" name="color">
                  @if ($errors->has('color'))
                    <p class="help is-danger">{{ $errors->first('color') }}</p>
                  @endif
                </div>

              </div>
              <div class="column">
                <div class="control">
                  <label class="label">Year</label>
                  <input class="input {{ $errors->has('year') ? ' is-danger' : '' }}" value="{{ old('year') }}" type="text" placeholder="Year" name="year">
                  @if ($errors->has('year'))
                    <p class="help is-danger">{{ $errors->first('year') }}</p>
                  @endif
                </div>
                
                <label class="label">[Type] Rate</label>
                <div class="control has-addons">
                  <span class="select">
                    <select name="type">
                      <option value="3 Axel">3 Axel</option>
                      <option value="4 Axel">4 Axel</option>
                    </select>
                  </span>
                  <input class="input {{ $errors->has('rate') ? ' is-danger' : '' }}" value="{{ old('rate') }}" type="text" placeholder="Rate" name="rate">
                  @if ($errors->has('rate'))
                    <p class="help is-danger">{{ $errors->first('rate') }}</p>
                  @endif
                </div>

                <div class="control">
                  <input class="input" type="text" placeholder="Truck No." name="truck_no" disabled>
                </div>

              </div>
              <div class="column">
                <div class="control">
                  <label class="label">Reg. no</label>
                  <input class="input {{ $errors->has('reg_no') ? ' is-danger' : '' }}" value="{{ old('reg_no') }}" type="text" placeholder="Enter Car Registration No" name="reg_no">
                  @if ($errors->has('reg_no'))
                    <p class="help is-danger">{{ $errors->first('reg_no') }}</p>
                  @endif
                </div>

                {{-- <div class="control">
                  <label class="label">Truck Type</label>
                  <input class="input {{ $errors->has('reg_no') ? ' is-danger' : '' }}" value="{{ old('reg_no') }}" type="text" placeholder="Enter Car Registration No" name="reg_no">
                  @if ($errors->has('reg_no'))
                    <p class="help is-danger">{{ $errors->first('reg_no') }}</p>
                  @endif
                </div> --}}

                <div class="control">
                  <label class="label">Empty Weight</label>
                  <input class="input {{ $errors->has('weight') ? ' is-danger' : '' }}" value="{{ old('weight') }}" type="text" placeholder="Truck Empty Weight" name="weight">
                  @if ($errors->has('weight'))
                    <p class="help is-danger">{{ $errors->first('weight') }}</p>
                  @endif
                </div>

              </div>
            </div>
            <p class="control">
              <button class="button is-primary" type="submit">Submit</button>
              <button class="button is-link" type="reset">Cancel</button>
            </p>
          </form>
        </article>
      </div>

  </div>
@endsection

