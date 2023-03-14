<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo e(get_instance()->config->item('nama_perush')); ?></title>
	<link rel="shortcut icon" href="<?= base_url() ?>assets/lsjimage/lti.svg" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/backend.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
	<script src="<?= base_url() ?>assets/js/backend-bundle.min.js"></script>
</head>

<body class=" ">
	<section class="login-content">
		<div class="container">
			<div class="row align-items-center justify-content-center px-lg-5 pt-5">
				<div class="col-sm-12 col-lg-10 text-center pb-lg-5">
					<img src="<?= base_url() ?>assets/lsjimage/lti.svg" height="80px" alt="Pic">
				</div>

				<div class="col-sm-12 col-md-12 col-lg-6 text-center">
					<?php echo $__env->make("metronic.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<h2 class="mb-2">Login</h2>
					<p class="font-weight-bold"><?php echo e(get_instance()->config->item('nama_perush')); ?>

						Booking Sistem
					</p>

					<form method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12 mb-2">
								<?= form_error('username', '<medium class="text-danger pl-1 text-left">', '</medium>') ?>
								<div class="floating-label form-group">
									<input class="floating-input form-control form-control-lg" name="username" placeholder=" ">

									<label>Username</label>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 mb-2">
								<?= form_error('password', '<medium class="text-danger pl-1 text-left">', '</medium>') ?>
								<div class="floating-label form-group">
									<input class="floating-input form-control form-control-lg" name="password" type="password" placeholder=" " id="password">
									<label>Password</label>
								</div>
								<div class="text-left">
									<label>
										<input type="checkbox" name="shows" id="shows"> Show Password
									</label>
								</div>
							</div>
							
						</div>
						<div class="container px-0">
							<button type="submit" style="background-color: #00a811; color: white" class="btn w-100 pt-2 pb-2">
								<span class="mr-3"><i class="fa fa-lock"></i></span>	Masuk
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>

<script type="text/javascript">
	$('[id="shows"]').change(function()
	{
		if ($(this).is(':checked')){
			$("#password").attr("type", "text");
		}
		else{
			$("#password").attr("type", "password");
		}
	});
</script>
</html><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/login.blade.php ENDPATH**/ ?>