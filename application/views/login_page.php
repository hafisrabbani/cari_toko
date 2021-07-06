<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to <?php echo $this->config->item('site_name'); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/iconssb.png') ?>" />
	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/animate.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
	<style>
		.loginCover {
			background-image: url(assets/images/ssbcover.jpg);
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			height: 100%;
			position: fixed;
			top: 0; bottom: 0;
			left: 0; right: 0;
			-webkit-filter: blur(2px);
			transform: scale(1.1);
		}

		.rightLogin {
			background-image: url("assets/images/ssblogin.png");
			background-size: contain;
			background-position: center;
			border-left: 2px solid #187ca6;
			height: 373px;
			background-repeat: no-repeat;
		}
		.field-icon {
			float: right;
			margin-left: -25px;
			margin-right: 10px;
			margin-top: -25px;
			position: relative;
			z-index: 2;
		}
		body {font-family: Arial, Helvetica, sans-serif;}
		* {box-sizing: border-box;}

		.input-container {
			display: -ms-flexbox; /* IE10 */
			display: flex;
			width: 100%;
			margin-bottom: 15px;
		}

		.icon {
			padding: 10px;
			background: dodgerblue;
			color: white;
			min-width: 50px;
			text-align: center;
		}

		.input-field {
			width: 100%;
			padding: 10px;
			outline: none;
		}

		.input-field:focus {
			border: 2px solid dodgerblue;
		}

		/* Set a style for the submit button */
		.btn {
			background-color: dodgerblue;
			color: white;
			padding: 15px 20px;
			border: none;
			cursor: pointer;
			width: 100%;
			opacity: 0.9;
		}

		.btn:hover {
			opacity: 1;
		}
	</style>
</head>
<body class="gray-bg">
	<div class="loginCover"></div>
	<div class="loginColumns animated fadeInDown">
		<div class="ibox-content">
			<div class="row">
				<div class="col-md-8">
					<!-- <marquee scrolldelay="70"> -->
						<?php
						date_default_timezone_set("Asia/Jakarta");
						echo $this->session->userdata("tools_app");
						$hour = date('H');
						if((int)($hour) >= 0){
							$greeting = "Goood Morning!";
						}
						if((int)($hour) >= 6){
							$greeting = "Goood Morning!";
						} 
						if((int)($hour) >= 12){
							$greeting = "Good Noon!";
						}
						if((int)($hour) >= 15){
							$greeting = "Good Afternoon!";
						}
						if((int)($hour) >= 18){
							$greeting = "Good Evening!";
						}
						if((int)($hour) >= 20){
							$greeting = "Good Night!";
						}
						?>

						<br>
						<br>
						<h3 class="font-bold" style="text-align:center;margin-top:10%;"><?php echo $greeting; ?></h3>
						<p><h2 class="font-bold" style="text-align:center;">Timesheet Management</h2></p>
						<br>
						<br>
					<!-- </marquee> -->
					<?php if($this->session->flashdata("error")){ ?>
						<div class="alert alert-danger alert-dismissable">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>

							<?php
							echo $this->session->flashdata("error");
							unset($_SESSION["error"]);
							?>
						</div>
					<?php } ?>
					<form class="m-t" role="form" action="<?php echo base_url("login/action") ?>" method="POST">
						<div class="input-container">
							<i class="fa fa-user icon"></i>
							<input class="input-field" type="text" placeholder="Username" name="username" value="superadmin@gmail.com" required="">
						</div>
						<div class="input-container">
							<i class="fa fa-key icon toggle-password" toggle="#password"></i>
							<input class="input-field" id="password" type="password" placeholder="Password" name="password" value="superadmin">
						</div>

						<button type="submit" name="login" class="btn btn-success block full-width m-b">LOGIN</button>
					</form>
					<p class="m-t" style="text-align:center;">
						<small>Developed By <a href="http://www.emcorpstudio.com/" target="_blank">Emcorp Studio</a> | PT. Sumber Setia Budi &copy; <?php echo date('Y'); ?></small>
					</p>
				</div>
				<div class="col-md-4 rightLogin"></div>
			</div>
		</div>
	</div>
	<!-- Mainly scripts -->
	<script src="<?= base_url('assets/js/jquery-2.1.1.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js') ?>"></script>
	<script src="<?= base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>

	<!-- Custom and plugin javascript -->
	<script src="<?= base_url('assets/js/inspinia.js') ?>"></script>
	<script src="<?= base_url('assets/js/plugins/pace/pace.min.js') ?>"></script>
	<script>
		$(document).on("click", ".toggle-password", function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
// function myFunction() {
//   var x = document.getElementById("myInput");
//   if (x.type === "password") {
//     x.type = "text";
//   } else {
//     x.type = "password";
//   }
// }
</script>
</body>
</html>