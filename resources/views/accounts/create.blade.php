@extends('layouts.shipment')

@section('content')
	<br>
	
	<div class="row">
	  <div class="col-md-3"></div>
	  <div class="col-md-6">

	    <div class="panel panel-info">

	    <div class="panel-heading">
		    <a class="btn btn-default" title="List Entries" href="{{ route('accounts.index') }}"><i class="fa fa-list"></i></a> New Entry
		    <a class="btn btn-default pull-right" title="Dashboard" href="{{ route('home') }}"><i class="fa fa-home"></i></a>
	    </div>

	      <div class="panel-body">

	      	@if(session()->has('success'))
			    <div class="alert alert-success alert-dismissable">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ session()->get('success') }}
				</div>
			@endif

	        <form action="{{ route('accounts.store') }}" method="POST">

	        	{{ csrf_field() }}



				<div class="form-group">
					<label class="col-2 col-form-label">Truck</label>
					<div class="col-10">
						<select name="truck_id" class="form-control is-searchable" style="width: 100%">
							@foreach( $trucks as $truck )
					        	<option value="{{ $truck->id }}">{{ $truck->brand() }}</option>
					    	@endforeach
					    </select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-2 col-form-label">Company [Transporter]</label>
					<div class="col-10">
					    <select name="company_id" class="form-control is-searchable" style="width: 100%">
							@foreach( $companies as $company )
					        	<option value="{{ $company->id }}">{{ $company->name }}</option>
					    	@endforeach
					    </select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-2 col-form-label">[Liters] Fuel Intake</label>
					<div class="col-10">
					    <input class="form-control" name="fuel" type="text" placeholder="Enter Fuel Intake...">
					</div>
				</div>

				<div class="form-group">
					<label class="col-2 col-form-label">[Gh&cent;] Cost</label>
					<div class="col-10">
					    <input class="form-control" name="cost" type="text" placeholder="Cost">
					</div>
				</div>

				<div class="form-group">
					<label class="col-2 col-form-label">Note</label>
					<div class="col-10">
		              <textarea class="form-control" name="note" placeholder="Anything Else !?"></textarea>
		            </div>
				</div>

	          <button type="submit" class="btn btn-info">Submit</button>

	        </form>

	      </div>

	    </div>

	  </div>
	</div>




	<div class="app-main" style="min-height: 17vh"></div>

@endsection
