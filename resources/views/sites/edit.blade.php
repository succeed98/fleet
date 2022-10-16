@extends('layouts.app')

@section('content')
  {{-- breadcrumbs --}}
  <nav class="level app-levelbar">
      <div class="level-left">
          <div class="level-item">
              <h3 class="subtitle is-5"><strong>Sites</strong></h3>
            </div>
          <div class="level-item">
            <span aria-label="Sites" class="icon tooltip tooltip--right tooltip--small tooltip--rounded">
              <a href="{{ route('sites.index') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
            </span>
          </div>
      </div>
      <div class="level-right is-hidden-mobile">
          <ol class="breadcrumb">
              <li><a href="{{ route('sites.index') }}" class="is-active">Sites</a></li>
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
          <h1 class="title">Edit Site [Quary]</h1>
          <h2 class="subtitle">Fill in the form to edit this site</h2>
          <form role="form" method="POST" action="{{ route('sites.update', $site->id) }}" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="columns">

              <div class="column">

                <label class="label">[Type] Name</label>
                <div class="control has-addons">
                  <span class="select">
                    <select name="type">
                      <option value="loading">Loading</option>
                    </select>
                  </span>
                  <input class="input {{ $errors->has('name') ? ' is-danger' : '' }}" value="{{ $site->name }}" type="text" placeholder="Enter Name" name="name" autofocus>
                  @if ($errors->has('name'))
                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                  @endif
                </div>

                <div class="control">
                  <label class="label">Telephone</label>
                  <input class="input {{ $errors->has('telephone') ? ' is-danger' : '' }}" value="{{ $site->telephone }}" type="text" placeholder="Telephone Number" name="telephone">
                  @if ($errors->has('telephone'))
                    <p class="help is-danger">{{ $errors->first('telephone') }}</p>
                  @endif
                </div>
                
              </div>
              <div class="column">

                <div class="control">
                  <label class="label">Address</label>
                  <textarea name="address" class="input" id="" cols="30" rows="40" style="height: 12vh">{{ $site->address }}</textarea>
                </div>
                
              </div>
              <div class="column">

                <div class="control">
                  <label class="label">Email</label>
                  <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" value="{{ $site->email }}" type="text" placeholder="Enter Email Address" name="email">
                  @if ($errors->has('email'))
                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                  @endif
                </div>

                <div class="control">
                  <label class="label">Rate [Per Tonne]</label>
                  <input class="input {{ $errors->has('rate') ? ' is-danger' : '' }}" value="{{ $site->rate }}" type="text" placeholder="Enter Quary Rate Per Tonne" name="rate">
                  @if ($errors->has('rate'))
                    <p class="help is-danger">{{ $errors->first('rate') }}</p>
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

