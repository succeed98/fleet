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
              <li><span class="active">Edit</span></li>
          </ol>
      </div>
  </nav>

  @if(session()->has('info'))
    <div class="notification is-info">
      <button class="delete"></button>
        {{ session()->get('info') }}
    </div>
  @endif

  <div>

    <div class="tile is-parent">
        <article class="tile is-child box">
          <h1 class="title">Edit Truck</h1>
          <h2 class="subtitle">Fill in the form to edit truck details</h2>
          <form role="form" method="POST" action="{{ route('trucks.update', $truck->id) }}" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="columns">

              <div class="column">

                <div class="control">
                  <label class="label">Make</label>
                  <input class="input {{ $errors->has('make') ? ' is-danger' : '' }}" value="{{ $truck->make }}" type="text" placeholder="Enter Make" name="make" autofocus>
                  @if ($errors->has('make'))
                    <p class="help is-danger">{{ $errors->first('make') }}</p>
                  @endif
                </div>
                
                <div class="control">
                  <label class="label">Model</label>
                  <input class="input {{ $errors->has('model') ? ' is-danger' : '' }}" value="{{ $truck->model }}" type="text" placeholder="Enter Model" name="model">
                  @if ($errors->has('model'))
                    <p class="help is-danger">{{ $errors->first('model') }}</p>
                  @endif
                </div>

                <div class="control">
                  <label class="label">Color</label>
                  <input class="input {{ $errors->has('color') ? ' is-danger' : '' }}" value="{{ $truck->color }}" type="text" placeholder="Enter Color" name="color">
                  @if ($errors->has('color'))
                    <p class="help is-danger">{{ $errors->first('color') }}</p>
                  @endif
                </div>

              </div>
              <div class="column">
                <div class="control">
                  <label class="label">Year</label>
                  <input class="input {{ $errors->has('year') ? ' is-danger' : '' }}" value="{{ $truck->year }}" type="text" placeholder="Year" name="year">
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
                  <input class="input {{ $errors->has('rate') ? ' is-danger' : '' }}" value="{{ $truck->rate }}" type="text" placeholder="Rate" name="rate">
                  @if ($errors->has('rate'))
                    <p class="help is-danger">{{ $errors->first('rate') }}</p>
                  @endif
                </div>

                <div class="control">
                  <input class="input" type="text" placeholder="Truck No." value="{{ $truck->truck_no }}" name="truck_no" disabled>
                </div>
                
              </div>
              <div class="column">
                <div class="control">
                  <label class="label">Reg. no</label>
                  <input class="input {{ $errors->has('reg_no') ? ' is-danger' : '' }}" value="{{ $truck->reg_no }}" type="text" placeholder="Enter Car Registration No" name="reg_no">
                  @if ($errors->has('reg_no'))
                    <p class="help is-danger">{{ $errors->first('reg_no') }}</p>
                  @endif
                </div>

                <div class="control">
                  <label class="label">Empty Weight</label>
                  <input class="input {{ $errors->has('weight') ? ' is-danger' : '' }}" value="{{ $truck->weight }}" type="text" placeholder="Truck Empty Weight" name="weight">
                  @if ($errors->has('weight'))
                    <p class="help is-danger">{{ $errors->first('weight') }}</p>
                  @endif
                </div>

              </div>
            </div>
            <p class="control">
              <button class="button is-primary" type="submit">Update</button>
              <button class="button is-link" type="reset">Cancel</button>
            </p>
          </form>
        </article>
      </div>

  </div>
@endsection

