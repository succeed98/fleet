<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">

    <div class="panel panel-info">

      <div class="panel-heading">Shipment Form</div>

      <div class="panel-body">

        <form action="{{ route('shipment.store') }}" id="shipment-form">

          <div class="form-group">
            <label for="example-text-input" class="col-2 col-form-label">Waybill No.</label>
            <div class="col-10">
              <input class="form-control" name="bill-no" type="text" id="example-text-input" placeholder="Enter Bill No.">
            </div>
          </div>

          <div class="form-group">
            <label for="example-url-input" class="col-2 col-form-label">Driver</label>
            <div class="col-10">
              <select class="form-control" name="driver_id">
                @foreach( $drivers as $driver )
                  <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
              </select>
            </div>
          </div><br>

          <div class="form-check">
            <label>
              <input type="checkbox" class="form-check-input weight-bridge" value="weighed" name="weighed">
              Using Weight Bridge
            </label>
          </div><br>
          

          <div class="form-group weight-input" style="display: none">
            <label for="example-url-input" class="col-2 col-form-label">[Unit] Weight</label>
            <div class="col-10">
              <div class="col-md-3">
                 <select name="weight_unit" class="form-control">
                  <option value="tonnes">Tonnes</option>
                </select>
              </div>
              <div class="col-md-9">
                <input class="form-control" name="weight" type="text" id="example-text-input" placeholder="Enter Shipment Weight...">
              </div>
            </div>
            <br><br>
          </div>

          <div class="form-group truck-type">
            <label for="example-url-input" class="col-2 col-form-label">Truck Type</label>
            <div class="col-10">
              <div class="col-md-4">
                <input class="form-control" id="truck-type" name="truck_type" type="text" disabled>
              </div>
              <div class="col-md-6">
                <select name="material_type" class="form-control">
                  @foreach( ['Boulders', '0.500'] as $_material )
                  <option value="<?php echo $_material; ?>"><?php echo $_material; ?></option>
                  @endforeach
                </select>
              </div>
            </div>
            <br>
          </div>

          <div class="form-group">
            <label for="example-url-input" class="col-2 col-form-label">Site</label>
            <div class="col-10">
              <select class="form-control" name="site_id">
                @foreach( $sites as $site )
                  <option value="{{ $site->id }}">{{ $site->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="example-url-input" class="col-2 col-form-label">Company</label>
            <div class="col-10">
              <select class="form-control" name="company_id">
                @foreach( $companies as $company )
                  <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="example-text-input" class="col-2 col-form-label">Note</label>
            <div class="col-10">
              <textarea class="form-control" name="note" placeholder="Anything Else..."></textarea>
            </div>
          </div>

          <button type="submit" class="btn btn-info submitShipmentForm">Submit</button>

        </form>

      </div>

    </div>

  </div>
</div>


