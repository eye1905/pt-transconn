<?php

$ci = &get_instance();
// dd($ci->session->userdata('username'));
$ci->load->model('Rolemenumodel');
$session = $ci->session->userdata("user");
$nav_profile = $ci->Profil_model->get_profil($ci->session->userdata("user"));

?>
<div id="kt_header" class="header header-fixed">
	<div class="container-fluid d-flex align-items-stretch justify-content-between">
		<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

		</div>
		<div class="topbar">

			<div class="topbar-item">
				<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
					<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
					<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-6">
						<?php if(isset($nav_profile['nm_karyawan'])): ?>
						<?php echo e($nav_profile['nm_karyawan']); ?>

						<?php endif; ?>
					</span>
					<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
						<span class="symbol-label font-size-h5 font-weight-bold">
							<img src="<?= base_url() ?>assets/metronic/user/default.jpg" class="rounded-circle" style="width: 145%;">
						</span>
					</span>
				</div>
			</div>

		</div>
	</div>
</div>

<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-bold m-0">
			<small class="text-muted font-size-sm ml-2"></small>
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>

	<div class="offcanvas-content pr-5 mr-n5">
		<div class="d-flex align-items-center mt-5">

			<div class="symbol symbol-100 mr-5">
				<div class="symbol-label" style="background-image:url('<?= base_url() ?>assets/metronic/user/default.jpg')">
					<i class="symbol-badge bg-success"></i>
				</div>
			</div>

			<div class="d-flex flex-column">
				<a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
					<?php if(isset($nav_profile['nm_karyawan'])): ?>
					<?php echo e($nav_profile['nm_karyawan']); ?>

					<?php endif; ?>
				</a>
				<div class="text-muted mt-1">
					<?php if(isset($nav_profile['nama_role'])): ?>
					<?php echo e($nav_profile['nama_role']); ?>

					<?php endif; ?>
				</div>
				<div class="navi mt-2">
					<a href="<?php echo e(base_url()."auth/logout"); ?>" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
				</div>
			</div>
		</div>

		<div class="separator separator-dashed mt-8 mb-5"></div>

		
	</div>
</div><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/navbar.blade.php ENDPATH**/ ?>