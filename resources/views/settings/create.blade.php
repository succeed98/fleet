@extends('layouts.app')

@section('content')
  {{-- breadcrumbs --}}
  <nav class="level app-levelbar">
      <div class="level-left">
          <div class="level-item">
              <h3 class="subtitle is-5"><strong>Settings</strong></h3>
            </div>
          <div class="level-item">
            <span aria-label="Settings" class="icon tooltip tooltip--right tooltip--small tooltip--rounded">
              <a href="{{ route('app.settings') }}"><i class="fa fa-truck" aria-hidden="true"></i></a>
            </span>
          </div>
      </div>
      <div class="level-right is-hidden-mobile">
          <ol class="breadcrumb">
              <li><a href="{{ route('app.settings') }}" class="is-active">Settings</a></li>
              <li><span class="active">Create</span></li>
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
          <h1 class="title">Adjust Settings</h1>
          <h2 class="subtitle">Fill in the form to adjust your settings</h2>
          <form role="form" method="POST" action="{{ route('app.settings.store') }}">

            {{ csrf_field() }}


            <div class="columns">

              <div class="column">

                <div class="control">
                  <label class="label">[Tonnes]</label>
                  <input class="input" value="Max Allowed Weight" type="text" name="" disabled>
                </div>
                <br>
                <div class="control">
                  <label class="label">[Tonnes]</label>
                  <input class="input" value="Tonnage Allowance" type="text" name="" disabled>
                </div>

              </div>
              <div class="column">
                <div class="control">
                  <label class="label">3 Axel [Truck]</label>
                  <input class="input" value="{{ $settings['max_weight - 3 Axel'] or '' }}" type="text" name="max_weight[3 Axel]" autofocus>
                </div>
                <br>
                <div class="control">
                  <label class="label">Boulders [Material]</label>
                  <input class="input" value="{{ $settings['allowance - Boulders'] or '' }}" type="text" name="allowance[Boulders]">
                </div>
              </div>
              <div class="column">
                <div class="control">
                  <label class="label">4 Axel [Truck]</label>
                  <input class="input" value="{{ $settings['max_weight - 4 Axel'] or '' }}" type="text" name="max_weight[4 Axel]">
                </div>
                <br>
                <div class="control">
                  <label class="label">0.500 [Material]</label>
                  <input class="input" value="{{ $settings['allowance - 0.500'] or '' }}" type="text" name="allowance[0.500]">
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

