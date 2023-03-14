<!DOCTYPE html>
<html lang="en">
<head>

	<base href="">
	<meta charset="utf-8" />
	<title>Aplikasi Booking Online || <?php echo e(get_instance()->config->item("nama_perush")); ?></title>
	<link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/lsjimage/lti.svg">
	<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	
	<link href="<?= base_url() ?>assets/metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/metronic/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/metronic/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	
	<link href="<?= base_url() ?>assets/metronic/css/style.bundle.css" rel="stylesheet" type="text/css" />
	
	<link href="<?= base_url() ?>assets/metronic/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/metronic/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/metronic/css/themes/layout/header/menu/dark.css" rel="stylesheet" type="text/css" />
	
	
	<link href="<?= base_url() ?>assets/metronic/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/metronic/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
	
		
		<style type="text/css">
			.select2 {
				width:100%!important;
			}
		</style>
		
		<?php echo $__env->yieldContent("style"); ?>
		
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<script src="<?= base_url() ?>assets/metronic/plugins/global/plugins.bundle.js"></script>
		<script src="<?= base_url() ?>assets/metronic/js/scripts.bundle.js"></script>
		<script src="<?= base_url() ?>assets/metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="<?= base_url() ?>assets/metronic/js/pages/widgets.js"></script>
		
		
		
	</head>
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<a href="">
				<img alt="Logo" style="width: 10%;" src="<?= base_url() ?>assets/metronic/lti.svg" />
			</a>
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
					</span>
				</button>
			</div>
		</div>
		
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-row flex-column-fluid page">
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
					<div class="brand flex-column-auto" id="kt_brand">
						<a href="" class="brand-logo">
							<img alt="Logo" style="height: 50px;" src="<?= base_url() ?>assets/lsjimage/lti.svg" />
						</a>
						<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
							</span>
						</button>
					</div>
					
					<?php echo $__env->make('metronic.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</div>
				
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					
					<?php echo $__env->make('metronic.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						
						<?php echo $__env->make('metronic.breadcumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
						<div class="d-flex flex-column-fluid">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xl-12">
										<?php echo $__env->yieldContent("content"); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php echo $__env->make("metronic.inc_delete", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</body>
	
	<script type="text/javascript">
		
		$(document).ready(function() {
			if ($(window).width() > 300 && $(window).width() < 1000) {
				$("#img-logo").css("width", "30%");
			}
			else {
				$("#img-logo").css("width", "100%");
			}
			
			if ($(window).width() <= 768) {
				$("table").addClass("table-responsive");
				$("#collapseOne").removeClass("show");
				$("#headingOne").show();
			}else{
				$("table").removeClass("table-responsive");
				$("#collapseOne").addClass("show");
				$("#headingOne").hide();
			}
			
			$(window).resize(function() {
				if ($(window).width() > 300 && $(window).width() < 1000) {
					$("#img-logo").css("width", "30%");
				}
				else {
					$("#img-logo").css("width", "100%");
				}
				
				if ($(window).width() <= 768) {
					$("table").addClass("table-responsive");
					$("#collapseOne").removeClass("show");
					$("#headingOne").show();
				}else{
					$("table").removeClass("table-responsive");
					$("#collapseOne").addClass("show");
					$("#headingOne").hide();
				}
			});
		});
		
		function CheckDelete(url = ""){
			$("#form-select").attr("action", url);
			$("#modal-confirm").modal('show');
		}
		
		function goSubmitDelete() {
			$("#form-select").attr("method", "GET");
			$("#form-select").submit();
		}
		
		function goFilter(){
			$("#form-select").submit();
		}
		
		function goBatal() {
			$("#form-select").attr("method", "GET");
		}
		
		$("#select").change(function(){
			$("#form-select").attr("method", "GET");
			$("#form-select").submit();
		});
		
	</script>
	
</script>

<?php echo $__env->yieldContent("script"); ?>

</html>
<?php /**PATH D:\xampp\htdocs\trans\application\views/metronic/layout.blade.php ENDPATH**/ ?>