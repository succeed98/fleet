@extends('layouts.app')

@section('content')
  {{-- breadcrumbs --}}
  <nav class="level app-levelbar">
      <div class="level-left">
          <div class="level-item">
              <h3 class="subtitle is-5"><strong>Drivers</strong></h3>
            </div>
          <div class="level-item">
            <span aria-label="Drivers" class="icon tooltip tooltip--right tooltip--small tooltip--rounded">
              <a href="{{ route('drivers.index') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
            </span>
          </div>
      </div>
      <div class="level-right is-hidden-mobile">
          <ol class="breadcrumb">
              <li><a href="{{ route('drivers.index') }}" class="is-active">Drivers</a></li>
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
          <h1 class="title">Add New Driver</h1>
          <h2 class="subtitle">Fill in the form to add a new driver</h2>
          <form role="form" method="POST" action="{{ route('drivers.store') }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="columns">

              <div class="column">

                <label class="label">[Gender] Name</label>
                <div class="control has-addons">
                  <span class="select">
                    <select name="gender">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </span>
                  <input class="input {{ $errors->has('name') ? ' is-danger' : '' }}" value="{{ old('name') }}" type="text" placeholder="Enter Name" name="name" autofocus>
                  @if ($errors->has('name'))
                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                  @endif
                </div>
                
              </div>
              <div class="column">

                <div class="control">
                  <label class="label">DOB</label>
                  <input class="input datepicker" value="" type="text" placeholder="" name="dob">
                </div>

                <div class="control">
                  <label class="label">Driver. no</label>
                  <input class="input {{ $errors->has('driver_no') ? ' is-danger' : '' }}" value="{{ old('driver_no') }}" type="text" placeholder="Driver No" name="driver_no" disabled>
                  @if ($errors->has('driver_no'))
                    <p class="help is-danger">{{ $errors->first('driver_no') }}</p>
                  @endif
                </div>
                
              </div>
              <div class="column">

                <div class="control">
                  <label class="label">License. no</label>
                  <input class="input {{ $errors->has('license_no') ? ' is-danger' : '' }}" value="{{ old('license_no') }}" type="text" placeholder="Enter Driver License No" name="license_no">
                  @if ($errors->has('license_no'))
                    <p class="help is-danger">{{ $errors->first('license_no') }}</p>
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

