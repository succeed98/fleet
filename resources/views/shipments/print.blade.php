<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	{{-- Boostrap --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<title>Shipment Invoice</title>
    <style type="text/css">
        
        body {
          background: rgb(204,204,204);
          font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif !important;
        }

        @page{
            size: auto;
            margin: 0;
        }

        .table.no-border tr td, .table.no-border tr th {
          border-width: 0;
          border-color: white;
        }
        td {
            padding: 5px;
        }

    </style> 

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2">
			<div class="panel panel-default main">

			    <div class="panel-body">
			        
			        <div class="row">
			            <div class="col-lg-9 col-md-9 col-sm-9">
			                <h3>To</h3>
			                <?php
			                	$company = App\Models\Company::find($shipment->company_id);
			                	$truck = App\Models\Truck::find($shipment->truck_id);
			                ?>
			                <p><b>{{ $company->name }}</b></p>
			                <p class="offset-margin">{{ $company->address }} - {{ $company->telephone }} - {{ $company->email }}</p>
			                <p><label>bill #:</label> <i>{{ $shipment->uid }}</i></p>
			                <p><label>date:</label> <i>{{ date('dS M, Y - H:i:s', $shipment->created_at->timestamp) }}</i></p>
			            </div>
			            
			            <div class="col-lg-3 col-md-3 col-sm-3" style="position: absolute; right: 4%; top: 3vh">
			                <h2>Invoice [Transporter]</h2>
			            </div>
			        </div>
			        <!--row-->
			        
			        <div class="row">
			            <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 content">
			                <div class="panel panel-default">
			                    <div class="panel-heading">
	                		        <h1 class="panel-title">Invoice Details</h1>
	                		    </div>
			                    <div class="panel-body">
			                        <div class="row">
	    		                        <div class=" col-lg-12 col-md-12 col-sm-12 description">
	            		              <table class="table">
	                                    <thead>
	                                      <tr>
	                                        <th>Truck #</th>
	                                        <th>Truck Brand</th>
	                                        <th class="text-center">Weight</th>
	                                        <th class="text-center">Description</th>
	                                        <th>Status</th>
	                                      </tr>
	                                    </thead>
	                                    <tbody>
	                                      <tr>
	                                      	<td>{{ $truck->truck_no }}</td>
	                                      	<td>{{ $truck->year . ',' }} {{ $truck->make }} {{ $truck->model }} {{ '[' . $truck->color . ']' }}</td>
	                                      	<td class="text-center">
					                        	@if( $shipment->weight == '' )
					                        		-
					                        	@else
					                        		{{ $shipment->weight . ' ' . ucfirst($shipment->weight_unit) }}
					                        	@endif
					                        </td>
	                                        <td class="text-center">{{ $shipment->description }} -</td>
	                                        <td>{{ ucfirst($shipment->status) }}</td>
	                                      </tr>
	                                    </tbody>
	                                  </table>
	    		                            
	    		                         
	    		                       </div>
	    		                       
	    		                       <div class="col-lg-8 pull-left" style="border-top:solid #ddd 1px;"></div>
	    		                        
	        		                        <div class="col-lg-4 col-md-4 col-sm-4 pull-right blank">
	        		                            
	        		                  <table class="table table bordered">
	        		                      <tbody>
	        		                        {{-- <tr>
			                                    <td>
			                                    	<label>Total:</label>
			                                    	<span class="pull-right">
			                                    		@if( $shipment->cost == '' )
							                        		-
							                        	@else
							                        		{{ 'GHS ' . $shipment->cost }}
							                        	@endif
			                                    	</span>
			                                    </td>
			                                </tr> --}}
			                              	<tr style="background-color:#eee;">
			                                    <td>
			                                    	<label>Amount Due:</label>
			                                    	<span class="pull-right">
				                                    	@if( $shipment->cost == '' )
							                        		-
							                        	@else
							                        		{{ 'GHS ' . $shipment->cost }}
							                        	@endif
				                                    </span>
			                                    </td>
			                                </tr>
	        		                      </tbody>

			                            </table>
	        		                        </div>
	    		                        </div>
			                        <!--row-->
			                    </div>
			                    
			                </div>
			            </div>
			        </div>
			        
			        
			    </div>
			    
			</div>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2">
			<div class="panel panel-default main">

			    <div class="panel-body">
			        
			        <div class="row">
			            <div class="col-lg-9 col-md-9 col-sm-9">
			                <h3>To</h3>
			                <?php
			                	$site = App\Models\Site::find($shipment->site_id);
			                	$truck = App\Models\Truck::find($shipment->truck_id);
			                ?>
			                <p><b>{{ $site->name }}</b></p>
			                <p class="offset-margin">{{ $site->address }} - {{ $site->telephone }} - {{ $site->email }}</p>
			                <p><label>bill #:</label> <i>{{ $shipment->uid }}</i></p>
			                <p><label>date:</label> <i>{{ date('dS M, Y - H:i:s', $shipment->created_at->timestamp) }}</i></p>
			            </div>
			            
			            <div class="col-lg-3 col-md-3 col-sm-3" style="position: absolute; right: 4%; top: 3vh">
			                <h2>Invoice [Quary]</h2>
			            </div>
			        </div>
			        <!--row-->
			        
			        <div class="row">
			            <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 content">
			                <div class="panel panel-default">
			                    <div class="panel-heading">
	                		        <h1 class="panel-title">Invoice Details</h1>
	                		    </div>
			                    <div class="panel-body">
			                        <div class="row">
	    		                        <div class=" col-lg-12 col-md-12 col-sm-12 description">
	            		              <table class="table">
	                                    <thead>
	                                      <tr>
	                                        <th>Truck #</th>
	                                        <th>Truck Brand</th>
	                                        <th class="text-center">Weight</th>
	                                        <th class="text-center">Description</th>
	                                        <th>Status</th>
	                                      </tr>
	                                    </thead>
	                                    <tbody>
	                                      <tr>
	                                      	<td>{{ $truck->truck_no }}</td>
	                                      	<td>{{ $truck->year . ',' }} {{ $truck->make }} {{ $truck->model }} {{ '[' . $truck->color . ']' }}</td>
	                                      	<td class="text-center">
					                        	@if( $shipment->weight == '' )
					                        		-
					                        	@else
					                        		{{ $shipment->weight . ' ' . ucfirst($shipment->weight_unit) }}
					                        	@endif
					                        </td>
	                                        <td class="text-center">{{ $shipment->description }} -</td>
	                                        <td>{{ ucfirst($shipment->status) }}</td>
	                                      </tr>
	                                    </tbody>
	                                  </table>
	    		                            
	    		                         
	    		                       </div>
	    		                       
	    		                       <div class="col-lg-8 pull-left" style="border-top:solid #ddd 1px;"></div>
	    		                        
	        		                        <div class="col-lg-4 col-md-4 col-sm-4 pull-right blank">
	        		                            
	        		                  <table class="table table bordered">
	        		                      <tbody>
	        		                        {{-- <tr>
			                                    <td>
			                                    	<label>Total:</label>
			                                    	<span class="pull-right">
			                                    		@if( $shipment->quary_cost == '' )
							                        		-
							                        	@else
							                        		{{ 'GHS ' . $shipment->quary_cost }}
							                        	@endif
			                                    	</span>
			                                    </td>
			                                </tr> --}}
			                              	<tr style="background-color:#eee;">
			                                    <td>
			                                    	<label>Amount Due:</label>
			                                    	<span class="pull-right">
				                                    	@if( $shipment->quary_cost == '' )
							                        		-
							                        	@else
							                        		{{ 'GHS ' . $shipment->quary_cost }}
							                        	@endif
				                                    </span>
			                                    </td>
			                                </tr>
	        		                      </tbody>

			                            </table>
	        		                        </div>
	    		                        </div>
			                        <!--row-->
			                    </div>
			                    
			                </div>
			            </div>
			        </div>
			        
			        
			    </div>
			    
			</div>
		</div>
	</div>
</body>
</html>