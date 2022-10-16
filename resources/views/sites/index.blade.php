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
              <li><span class="active">List</span></li>
          </ol>
      </div>
  </nav>

  <div>
    <div class="tile is-ancestor">
      <div class="tile is-parent">
        <article class="tile is-child box">
          <h4 class="title">Registered Sites
            <span aria-label="Add New" class="tooltip tooltip--right tooltip--small tooltip--rounded">
              <a class="button" href="{{ route('sites.create') }}">
                <span class="icon">
                  <i class="fa fa-plus-circle"></i>
                </span>
                <span>Add</span>
              </a>
            </span>
            
          </h4>

          <div class="table-responsive">
            <table class="table is-bordered is-striped is-narrow">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Address</th>
                  <th>Telephone no.</th>
                  <th>Rate [Per Tonne]</th>
                  <th>Links</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Address</th>
                  <th>Telephone no.</th>
                  <th>Rate [Per Tonne]</th>
                  <th>Links</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($sites as $i_row)
                    <tr>
                      <td>{{ ucfirst($i_row->name) }}</td>
                      <td>{{ ucfirst($i_row->type) }}</td>
                      <td>{{ ucfirst($i_row->address) }}</td>
                      <td>{{ $i_row->telephone }}</td>
                      <td>{{ $i_row->rate }}</td>
                      
                      <td class="is-icon">
                        <a href="{{ route('sites.edit', $i_row->id) }}" class="button is-warning">
                          <i class="fa fa-pencil"></i>
                        </a>
                      </td>
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

