@extends('layouts.app')

@section('content')
  {{-- breadcrumbs --}}
  <nav class="level app-levelbar">
      <div class="level-left">
          <div class="level-item">
              <h3 class="subtitle is-5"><strong>Alerts</strong></h3>
            </div>
          <div class="level-item">
            <span aria-label="Sites" class="icon tooltip tooltip--right tooltip--small tooltip--rounded">
              <a href="{{ route('alerts') }}"></a>
            </span>
          </div>
      </div>
      <div class="level-right is-hidden-mobile">
          <ol class="breadcrumb">
              <li><a href="{{ route('alerts') }}" class="is-active">Alerts</a></li>
          </ol>
      </div>
  </nav>

  <div>
    <div class="tile is-ancestor">
      <div class="tile is-parent">
        <article class="tile is-child box">
          <h4 class="title">Alerts
            <span aria-label="Add New" class="tooltip tooltip--right tooltip--small tooltip--rounded">
            </span>
            
          </h4>

          <div class="table-responsive">
            <table class="table is-bordered is-striped is-narrow">
              <thead>
                <tr>
                  <th>Type</th>
                  <th>User</th>
                  <th>Truck</th>
                  <th>Date</th>
                  <th>-</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Type</th>
                  <th>User</th>
                  <th>Truck</th>
                  <th>Date</th>
                  <th>-</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($alerts as $i_row)
                    <tr>
                      <td>[{{ ucfirst($i_row->type) }}]</td>
                      <td>{{ ucfirst($i_row->user->name) }} - {{ $i_row->user->email }}</td>
                      <td>{{ $i_row->truck->brand() }}</td>
                      <td>{{ $i_row->updated_at }}</td>
                      <td>{{ $i_row->updated_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </article>
      </div>
    </div>
  </div>
@endsection

