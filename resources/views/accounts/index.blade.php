@extends('layouts.shipment')

@section('content')
	<br>
	<div class="row">
	  <div class="col-md-2"></div>
	  <div class="col-md-8">

	    <div class="panel panel-info">

	      <div class="panel-heading">
	      	<a class="btn btn-default" title="Scanner" href="{{ route('accounts.create') }}"><i class="fa fa-plus-circle"></i></a> [Fuel] Entries <span class="badge">{{ count($entries) }}</span>
	      	<a class="btn btn-default pull-right" title="Dashboard" href="{{ route('home') }}"><i class="fa fa-home"></i></a>
	      </div>

	      <div class="panel-body">

	      	@if(session()->has('warning'))
			    <div class="alert alert-warning alert-dismissable">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ session()->get('warning') }}
				</div>
			@endif

	        <table class="table table-responsive">
	            <thead>
	                <tr>
	                    <th>Truck</th>
	                    <th>Company [Transporter]</th>
	                    <th>[Liters] Fuel Intake</th>
	                    <th>[Gh&cent;] Cost</th>
	                    <th>Note</th>
	                    <th>Options</th>
	                </tr>
	            </thead>
	            <tfoot>
	                <tr>
	                    <th>Truck</th>
	                    <th>Company [Transporter]</th>
	                    <th>[Liters] Fuel Intake</th>
	                    <th>[Gh&cent;] Cost</th>
	                    <th>Note</th>
	                    <th>Options</th>
	                </tr>
	            </tfoot>
	            <tbody>
	                @foreach($entries as $entry)
	                    <tr>
	                        <td>{{ $entry->truck->brand() }}</td>
	                        <td>{{ $entry->company->identifier() }}</td>
	                        <td>{{ $entry->fuel }}</td>
	                        <td>{{ $entry->cost }}</td>
	                        <td title="{{ $entry->note }}">{{ str_limit($entry->note, 5) }}</td>
	                        <td>
	                        	<a class="btn btn-danger is-confirmable" title="Delete Entry" href="{{ route('accounts.destroy', $entry->id) }}"><i class="fa fa-trash"></i></a>
	                        </td>
	                    </tr>
	                @endforeach
	            </tbody>
	        </table>

	        {{ $entries->links() }}

	      </div>

	    </div>

	  </div>
	</div>

	<div class="app-main" style="min-height: 17vh"></div>

@endsection
