<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Css -->
	<link href="<?= base_url('assets/scanner/bootstrap4/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/scanner/css/animate.min.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/scanner/scanner_design.css')?>" rel="stylesheet" type="text/css" />

	<!-- Icon -->
	<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico')?>" /> </head>

	<!-- Title -->
	<title> HRMIS | QR Scanner </title>

</head>
<body>

	<div class="h-100 d-flex justify-content-center align-items-center flex-column">

		<div class="top text-white text-center">
			<div class="div d-flex align-items-center">
				<div class="text">
					<h2><b>HRMIS QR SCAN</b></h2>
					<p>Human Resource Management Information System</p>
				</div>
			</div>
		</div>

		<div class="middle">
			<!-- Card -->
			<div class="container d-flex justify-content-center align-items-center mt-4" id="card-container">
				<div class="card shadow border-0 rounded" style="width: 20rem; height: 25rem;">
					<div class="card-body">
						<div class="d-flex justify-content-center align-items-center" style="height: 100%;">

							<!-- QR Scanner Lottie Animation -->
							<div class="scan-animation">
								<lottie-player src="https://assets2.lottiefiles.com/packages/lf20_njj3kyur.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
							</div>

							<!-- Camera -->
							<div class="canvas-container">
								<canvas id="canvas" width="280" height="240" hidden></canvas>
							</div>

							<!-- Processing -->
							<div class="processing-container d-none">
								<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_lofps4ke.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
							</div>

							<!-- Status (Success or Fail) -->
							<div class="status-container d-none text-center">

								<lottie-player id="success" class="d-none" src="https://assets3.lottiefiles.com/packages/lf20_vlnrpmgq.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop></lottie-player>

								<lottie-player id="failed" class="d-none mt-5 mb-5" src="https://assets5.lottiefiles.com/packages/lf20_nnon29rs.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop></lottie-player>

								<h5 class="status-text font-weight-bold"></h5>
								<button class="btn pl-4 pr-4" id="again"> <b> Scan Again </b> </button>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="bottom text-white mt-4">
			<b>Always Check the Time and Date of the Device!</b>
		</div>
		
	</div>
	

	
	<!-- Javascript -->
	<script src="<?=base_url('assets/scanner/js/jquery.min.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/scanner/bootstrap4/js/bootstrap.min.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/scanner/js/jsQR.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/scanner/js/lottie-player.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/scanner/scanner_script.js')?>" type="text/javascript"></script>
</body>
</html>