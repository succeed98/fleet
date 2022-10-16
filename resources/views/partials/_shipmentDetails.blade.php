<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">

    <div class="panel panel-success">

      <div class="panel-heading">Shipment Details</div>

      <div class="panel-body">

        {{-- <div id="shipment-details-json"></div> --}}

        <div class="form-group">
          <label for="example-text-input" class="col-2 col-form-label">Shipment UID</label>
          <div class="col-10">
            <input class="form-control shipment-uid" id="shipment-uid" value="" type="text" disabled>
          </div>
        </div>
        {{-- 15a159272529d8 --}}

        {{-- <button type="submit" class="">Print Invoice</button> --}}
        <a href="{{ route('shipment.print', '') }}" data-origin='shipment-details' class="btn btn-primary printShipmentInvoice">Print Invoice</a>

      </div>

    </div>

  </div>
</div>




