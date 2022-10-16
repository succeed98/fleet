@extends('layouts.shipment')

@section('content')
	<br>
	<div class="row">
	  <div class="col-md-2"></div>
	  <div class="col-md-8">

	    <div class="panel panel-info">

	      <div class="panel-heading"><a class="btn btn-default" title="Scanner" href="{{ route('shipment') }}"><i class="fa fa-undo"></i></a> My Shipments <span class="badge">{{ count($shipments) }}</span></div>

	      <div class="panel-body">

	        <table class="table table-responsive dt-table_">
	            <thead>
	                <tr>
	                    <th>Waybill No</th>
	                    <th>Site</th>
	                    <th>Truck</th>
	                    <th class="text-center">Weight</th>
	                    <th class="text-center">Cost[Transporter]</th>
	                    <th class="text-center">Cost[Quary]</th>
	                    <th>Description</th>
	                    <th>Status</th>
	                    <th>Created At</th>
	                    <th></th>
	                </tr>
	            </thead>
	            <tfoot>
	                <tr>
	                    <th>Waybill No</th>
	                    <th>Site</th>
	                    <th>Truck</th>
	                    <th class="text-center">Weight</th>
	                    <th class="text-center">Cost[Transporter]</th>
	                    <th class="text-center">Cost[Quary]</th>
	                    <th>Description</th>
	                    <th>Status</th>
	                    <th>Created At</th>
	                    <th></th>
	                </tr>
	            </tfoot>
	            <tbody>
	                @foreach($shipments as $shipment)
	                    <tr>
	                        <td>{{ $shipment->uid }}</td>
	                        <td>{{ $shipment->site->identifier() }}</td>
	                        <td>{{ $shipment->truck->brand() }}</td>
	                        <td class="text-center">
	                        	@if( $shipment->weight == '' )
	                        		-
	                        	@else
	                        		{{ $shipment->weight . ' ' . ucfirst($shipment->weight_unit) }}
	                        	@endif
	                        </td>
	                        <td class="text-center">{{ $shipment->cost }}</td>
	                        <td class="text-center">{{ $shipment->quary_cost }}</td>
	                        <td>{{ $shipment->description }}</td>
	                        <td>
	                        	@if( $shipment->status == 'complete' )
	                        		<span class="label label-success">{{ ucfirst($shipment->status) }}</span>
	                        	@else
	                        		<span class="label label-danger">{{ ucfirst($shipment->status) }}</span>
	                        	@endif
	                        </td>
	                        <td>{{ $shipment->created_at }}</td>
	                        <td>
	                        	{{-- <input class="form-control shipment-uid" id="" value="{{ $shipment->uid }}" type="hidden" disabled> --}}
	                        	<a class="btn btn-default printShipmentInvoice" data-origin='shipment-table' title="Print Invoice" href="{{ route('shipment.print', $shipment->uid) }}"><i class="fa fa-print"></i></a>
	                        </td>
	                    </tr>
	                @endforeach
	            </tbody>
	        </table>

	        {{ $shipments->links() }}

	      </div>

	    </div>

	  </div>
	</div>

	<div class="app-main" style="min-height: 17vh"></div>

@endsection
