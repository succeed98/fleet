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
              <li><span class="active">List</span></li>
          </ol>
      </div>
  </nav>

  <div>
    <div class="tile is-ancestor">
      <div class="tile is-parent">
        <article class="tile is-child box">
          <h4 class="title">Registered Drivers
            <span aria-label="Add New" class="tooltip tooltip--right tooltip--small tooltip--rounded">
              <a class="button" href="{{ route('drivers.create') }}">
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
                  <th></th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>DOB</th>
                  <th>License. no</th>
                  <th>Status</th>
                  <th colspan="3">Links</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>DOB</th>
                  <th>License. no</th>
                  <th>Status</th>
                  <th colspan="3">Links</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($drivers as $drivers)
                    <tr>
                      <td>{{ $drivers->driver_no }}</td>
                      <td>{{ ucfirst($drivers->name) }}</td>
                      <td>{{ ucfirst($drivers->gender) }}</td>
                      <td>{{ $drivers->dob }}</td>
                      <td>{{ $drivers->license_no }}</td>
                      <td>
                        @if( $drivers->status )
                          <span class="tag is-success">Active</span>
                        @else
                        <span class="tag is-danger">Inactive</span>
                        @endif
                      </td>
                      
                      <td class="is-icon">
                        <a href="#">
                          <i class="fa fa-pencil"></i>
                        </a>
                      </td>
                      <td class="is-icon">
                        <a href="#">
                          <i class="fa fa-eye"></i>
                        </a>
                      </td>
                      <td class="is-icon is-warning">
                        <a href="#">
                          <i class="fa fa-trash"></i>
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

