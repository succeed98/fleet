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
              <a href="{{ route('trucks.index') }}"><i class="fa fa-truck"></i></a>
            </span>
          </div>
      </div>
      <div class="level-right is-hidden-mobile">
          <ol class="breadcrumb">
              <li><a href="{{ route('trucks.index') }}" class="is-active">Trucks</a></li>
              <li><span class="active">List</span></li>
          </ol>
      </div>
  </nav>

  @if(session()->has('warning'))
    <div class="notification is-warning">
      <button class="delete"></button>
        {{ session()->get('warning') }}
    </div>
  @endif

  @if(session()->has('success'))
    <div class="notification is-success">
      <button class="delete"></button>
        {{ session()->get('success') }}
    </div>
  @endif

  <div>
    <div class="tile is-ancestor">
      <div class="tile is-parent">
        <article class="tile is-child box">
          <h4 class="title">Registered Trucks
            <span aria-label="Add New" class="tooltip tooltip--right tooltip--small tooltip--rounded">
              <a class="button" href="{{ route('trucks.create') }}">
                <span class="icon">
                  <i class="fa fa-plus-circle"></i>
                </span>
                <span>Add</span>
              </a>
            </span>
            <span aria-label="Print Barcodes" class="tooltip tooltip--right tooltip--small tooltip--rounded">
              <a class="button" target="_blank" onclick="$('#print_barcode').attr('action', '{{ route('truck.barcode.print') }}');$('#print_barcode').submit()">
                <span class="icon">
                  <i class="fa fa-print"></i>
                </span>
                <span>Print</span>
              </a>
            </span>
            <span aria-label="Print Barcodes" class="tooltip tooltip--right tooltip--small tooltip--rounded">
              <a class="button is-danger" target="_blank" onclick="true === confirm('Are you sure you want to delete this record(s)?') ? $('#print_barcode').attr('action', '{{ route('truck.destroy.batch') }}') && $('#print_barcode').submit() : ''">
                <span class="icon">
                  <i class="fa fa-trash"></i>
                </span>
                {{-- <span>Delete</span> --}}
              </a>
            </span>
            
          </h4>

          <div class="table-responsive">
            <form id="print_barcode" method="POST" action="">
              {{ csrf_field() }}
              <table class="table is-bordered is-striped is-narrow dt-table">
                <thead>
                  <tr>
                    <th><input type="checkbox" class="check-all"></th>
                    <th></th>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Color</th>
                    <th>Reg. no</th>
                    <th>Barcode</th>
                    <th>Type</th>
                    <th>Rate</th>
                    <th>Weight</th>
                    <th>Links</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th><input type="checkbox" class="check-all"></th>
                    <th></th>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Color</th>
                    <th>Reg. no</th>
                    <th>Barcode</th>
                    <th>Type</th>
                    <th>Rate</th>
                    <th>Weight</th>
                    <th>Links</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($trucks as $truck)
                      <tr>
                        <td><input type="checkbox" name="trucks[]" value="{{ $truck->id }}" class="truck-checkbox"></form></td>
                        <td>{{ $truck->truck_no }}</td>
                        <td>{{ $truck->year }}</td>
                        <td>{{ $truck->make }}</td>
                        <td>{{ $truck->model }}</td>
                        <td>{{ $truck->color }}</td>
                        <td>{{ $truck->reg_no }}</td>
                        <td>{{ $truck->barcode }}</td>
                        <td>{{ $truck->type }}</td>
                        <td>{{ $truck->rate }}</td>
                        <td>{{ $truck->weight }}</td>
                        
                        <td class="is-icon">
                          <a href="{{ route('trucks.edit', $truck->id) }}" class="button is-warning">
                            <i class="fa fa-pencil"></i>
                          </a>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </form>
          </div>
        </article>
      </div>
    </div>
  </div>
@endsection

