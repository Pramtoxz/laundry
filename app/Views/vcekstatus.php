<!DOCTYPE html>
<html lang="en">

<head>
    <title>CEK STATUS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>/assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>/assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>/assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>/assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>/assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/css/main.css">
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!--===============================================================================================-->
</head>

<body>
	<div class="col-md-12">

		<div class="limiter">
			<div class="container-login100"
				style="background-image: url('<?php echo base_url() ?>/assets/login/images/1.jpg');">
				<div class="wrap-login100">
					<div class="card ">
						<div class="card-header">
							<h5>Cek status cucian anda !</h5>
						</div>
						<div class="card-body">
							<table class="table tbl-striped" id="myTable">
								<thead>
									<th >Nama</th>
									<th>Status</th>
								</thead>
								<tbody>
								<tbody>
									<?php
									foreach ($cek->getResultObject() as $row) : ?>
									<tr style="height: 20px; text-align: center;">
										<td style="text-align:left ;"> <?= $row->notransaksi; ?></td>
										<td> 
											<?php if($row->status == '1'){ ?>
												<span class="btn btn-xs">Proses</span>
											<?php	} elseif($row->status == '2') { ?>
												<span class="btn btn-xs">Belum Bayar</span>
											<?php 	} else { ?>
												<span class="btn btn-xs">Selesai</span>
											<?php 	} ?>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
	
	
	
				</div>
			</div>
		</div>
	</div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>/assets/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>/assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url() ?>/assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>/assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>/assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>/assets/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>/assets/login/js/main.js"></script>

	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

	<script>
		$(document).ready( function () {
    		$('#myTable').DataTable();
		} );
	</script>

</body>

</html>