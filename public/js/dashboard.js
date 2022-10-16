$.fn.extend({
    animateCss: function (animationName, callback) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
            if (callback) {
              callback();
            }
        });
        return this;
    }
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

$(document).ready(function() {

	flatpickr('.datepicker', {});

	$('.is-searchable').select2();

	$(document).on('click', '.is-confirmable', function() {
		var chk = confirm("Are You Sure ?");
		if( chk ) {
			return true;
		} else {
			return false;
		}
	});
	
	if( $('.dt-table').length != 0 ) {
		$('.dt-table').DataTable();
	}

	$(document).on('click', 'aside.menu ul.menu-list li a.droppy', function(e) {

		e.preventDefault();

		// el has descendants

		var _expended = $(this).parent().children('a').attr('aria-expanded');
		// console.log(_expended);

		if( _expended == 'true' ) {
			$(this).parent().children('a').attr('aria-expanded', false);
			$(this).parent().find('ul').slideToggle();
		} else {
			$(this).parent().children('a').attr('aria-expanded', true);
			$(this).parent().find('ul').slideToggle();
		}


	});

	$(document).on('click', 'a.nav-item.is-hidden-tablet', function(e) {

		e.preventDefault();
		var _out = $('aside.app-sidebar').hasClass('slideInLeft');

		if( _out == true ) {
			$('aside.app-sidebar').removeClass('slideInLeft')
								.addClass('slideOutLeft');
			// $('aside.app-sidebar').animateCss('slideOutLeft');
		} else {
			$('aside.app-sidebar').removeClass('slideOutLeft')
								.addClass('slideInLeft');
		}

	});

	// dismiss bulma notification
	$(document).on('click', '.notification > button.delete', function() {
	    $(this).parent().addClass('is-hidden');
	    return false;
	});

	// select all from table
	$(document).on('click', '.check-all', function(e) {

		e.preventDefault();

		var checkBoxes = $('.truck-checkbox');
		checkBoxes.prop('checked', !checkBoxes.prop('checked'));

		// $('.check-all').prop('checked', !$('.check-all').prop('checked'));
		
		return false;
	});

	// shipment
	// focus box onpage load
	if( $('#truck-barcode').length != 0 ) {
		$('#truck-barcode').focus();
	}

	$('.truckDetails').animateCss('slideInTop');

	$(document).on('submit', '#barcode-form', function(e) {

		e.preventDefault();

		$('.shipment').hide();
		$('.loading-image').show();

		var barcode = $('#truck-barcode').val();
		var _url = $(this).attr('action');

		var _options = {
            type: 'GET',
            url: _url,
            data: {'truck': barcode},
            success: function(res) {
                // res = JSON.parse(res);
                if( null == res.truck ) {
                	// console.log('no truck');
                	$('#truck-barcode').prop('placeholder', 'No Match Found');

                	$('.shipment').show();
					$('.loading-image').hide();

                } else {
	                // console.log(res.truck.truck_no);
	                $('#barcode').prop('value', res.truck.barcode);

	                // update truck details
	                $('.truck-no').prop('value', res.truck.truck_no);
	                $('.truck-brand').prop('value', 
	                	res.truck.year + ', ' + res.truck.make + ' ' + res.truck.model + ' [' + res.truck.color + ']'
	                ); // 2013, Toyota Corolla [Red]

	                // append truck type
                	$('#truck-type').prop('value', res.truck.type);

	                $('.loading-image').hide();
	                // display truck details and shipment form
	                $('.truckDetails').show();
	                $('.shipmentForm').show();
                }

                $('#truck-barcode').prop('value', '');
                $('#truck-barcode').focus();

            },
            error: function(xhr, textStatus, errorThrown) {
                console.log('An error occurred! ' + errorThrown);
                // console.log(textStatus);
                // console.log(xhr);
                $('#truck-barcode').prop('placeholder', 'An error occurred! ' + errorThrown);

            	$('.shipment').show();
				$('.loading-image').hide();
            }
        };

		$.ajax(_options);

	});


	// submitShipmentForm
	$(document).on('submit', '#shipment-form', function(e) {

		e.preventDefault();

		$('.submitShipmentForm').html('<span class="fa fa-spin fa-spinner"></span>');

		var shipment = $('#shipment-form').serialize();
		var barcode = $('#barcode').val();
		var _url = $(this).attr('action');

		var _data = {
			'shipment': shipment,
			'truck'   : barcode,
		};

		var _options = {
            type: 'POST',
            url: _url,
            data: _data,
            success: function(res) {

                $('.submitShipmentForm').html('Submited');

                $('.shipmentForm').hide();
                if( res.status == 'success' ) {
                	// show shipement details panel with print and cancel button
                	$('#shipment-uid').prop('value', res.data.shipment.uid);
	                $('.shipmentDetails').show();
                } else if( res.status == 'error' ) {
                	// console.log('error');
                	// show error panel
                	$('.errorAlert').show();
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log('An error occurred! ' + errorThrown);
                $('.submitShipmentForm').html('Error');
            }
        };

		$.ajax(_options);

	});

	// print shipment invoice
	$(document).on('click', '.printShipmentInvoice', function(e) {
		e.preventDefault();

		var _origin = $(this).data('origin');

		if( _origin == 'shipment-table' ) {
			var _url_ = $(this).attr('href');
		} else if ( _origin == 'shipment-details' ) {
			var _url_ = $(this).attr('href') + '/' + $('.shipment-uid').val();
		}
		 
		window.open(_url_);
	});

	// managae weight bridge logic
	$(document).on('click', '.weight-bridge', function() {
		// hide weight input
		if( $(this).is(':checked') ) {
			$('.weight-input').show();
			$('.truck-type').hide();
		} else {
			$('.weight-input').hide();
			$('.truck-type').show();
		}
		
		// display truck type combo
	});

});