<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<!-- Bulma Version 0.6.0 -->
    <link rel="stylesheet" href="{{ asset('css/bulma/bulma.css') }}"/>

	<title>Print Truck Barcodes</title>
	<style>

	    html, body {
            background-color: #FFF !important;
            color: #636b6f !important;
            font-family: 'Raleway', sans-serif !important;
            font-weight: 100 !important;
            height: 100vh !important;
            margin: 0 !important;
        }

        page {
        	background: #F5F5F5 !important;
        	display: block !important;
        	margin: 0 auto !important;
        	margin-bottom: 0.5cm !important;
        	box-shadow: 0 0 0 5cm rgba(0, 0, 0, 0.5) !important;
        }

        page[size="A4"] {
        	width: 21cm !important;
        	height: 29.7cm !important;
        }

        page[size="A4"][layout="portrait"] {
        	height: 21cm !important;
        	width: 29.7cm !important;
        }

	    .print {
			height: 29.7cm !important;
		    width: 21cm !important;
		    background: #FFF !important;
		    margin: 0 auto !important;
		    box-shadow: 0 0 0.5cm rgba(0,0,0,0.5) !important;
		}

		.card {
			background-color: #F5F5F5 !important;
			padding: 1% !important;
			border-radius: 10px !important;
			text-align: center !important;
			box-shadow: 0 0 1.5px 0px #b9b9b9 !important;
			width: 30% !important;
			height: 33vh !important;
			margin-top: 1vh !important;
		}

		.details {
			height: 10vh !important;
			font-weight: bold !important;
		}

		.details span {
			display: block !important;
		}

		.qrcode {
			/**/
		}

	</style>
</head>
<body>
	<div class="print">
		<div class="columns is-multiline">
			@for ($i = 0; $i < count($trucks); $i++)
				<div class="column is-one-third card">
					<br>
					<div class="barcode">
						<?php echo DNS1D::getBarcodeSVG($trucks[$i]->barcode, "EAN5"); ?>
					</div>
					<div class="details">
						<span style="white-space: nowrap;overflow: hidden;"><h5>{{ $trucks[$i]->truck_no }}</h5></span>
						<span>{{ $trucks[$i]->year . ',' }} {{ $trucks[$i]->make }} {{ $trucks[$i]->model }} {{ '[' . $trucks[$i]->color . ']' }}</span>
					</div>
					<div class="qrcode">
						<?php echo DNS2D::getBarcodeSVG($trucks[$i]->barcode, "QRCODE"); ?>
					</div>
					<div class="details">
						<span style="font-size: 0.7em;"><h4>{{ $trucks[$i]->reg_no }}</h4></span>
					</div>
				</div>
			@endfor
		</div>
	</div>
</body>
</html>