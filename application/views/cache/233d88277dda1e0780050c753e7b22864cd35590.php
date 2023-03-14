
<?php $__env->startSection("content"); ?>
<style type="text/css">
	.badge-me{
		padding: 3px;
		padding-left: 8px;
		padding-right: 8px;
		border-radius: 20px;
		color: #FFFF;
		font-weight: bold;
		font-size: 10pt;
	}
</style>
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-top" style="background-color: #51c46f">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center pt-25 pb-35">
			<h2 class="font-weight-bolder text-light mb-0">Rignkasan Informasi</h2>
			<div class="d-flex">
				<a href="#" class="h5 text-light font-weight-bold">Statistik</a>
			</div>
		</div>
	</div>

</div>
<div class="container mt-n15 gutter-b">
	<div class="card card-custom">
		<div class="card-body py-12">
			<div class="mb-7">
				<div class="row align-items-center">
					<div class="col-lg-12 col-xl-12">
						<div class="row align-items-center">
							<div class="col-md-3 mt-2">
								<label>Marketing: </label>
								<select class="form-control" id="id_marketing">
									<option value="0">All</option>
									<?php $__currentLoopData = $marketing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($value->id_user); ?>"><?php echo e($value->nm_karyawan); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>

							<div class="col-md-3 mt-2">
								<label>Tanggal Awal : </label>
								<input type="date" name="dr_tgl" id="dr_tgl" class="form-control">
							</div>

							<div class="col-md-3 mt-2">
								<label>Tanggal Akhir :</label>
								<input type="date" name="sp_tgl" id="sp_tgl" class="form-control">
							</div>

							<div class="col-md-12 text-right mt-2">
								<button class="btn btn-sm btn-success" id="bt-filter">
									<i class="fa fa-search"></i> Cari
								</button>
								<button class="btn btn-sm btn-danger" id="bt-reset">
									<i class="fa fa-times"></i> Reset
								</button>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container" style="background-color: white">			
			<br>
			<div class="container gutter-b">
				<div class="row">
					<div class="col-lg-3">
						<!--begin::Callout-->
						<div class="card card-custom wave wave-animate wave-success mb-8 mb-lg-0">
							<div class="card-header border-0 pt-5 text-center">
								<h3 class="card-title font-weight-bolder">Jumlah Booking</h3>
							</div>
							<div class="card-body">						
								<div class="d-flex align-items-center">
									<!--begin::Icon-->
									<div class="mr-3">
										<span class="svg-icon svg-icon-4x">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Clipboard-check.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
													<path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000" />
													<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									<!--end::Icon-->
									<!--begin::Content-->
									<div class="d-flex flex-column">
										<input type="number" class="form-control" name="jml_booking" id="jml_booking" style="background: transparent; border: none; font-size: 16pt; font-weight: bold;" readonly>
									</div>
									<!--end::Content-->
								</div>
							</div>
						</div>
						<!--end::Callout-->
					</div>
					<div class="col-lg-3">
						<!--begin::Callout-->
						<div class="card card-custom wave wave-animate wave-success mb-8 mb-lg-0">
							<div class="card-header border-0 pt-5 text-center">
								<h3 class="card-title font-weight-bolder">Jumlah Pickup Internal</h3>
							</div>
							<div class="card-body">						
								<div class="d-flex align-items-center">
									<!--begin::Icon-->
									<div class="mr-3">
										<span class="svg-icon svg-icon-4x">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Clipboard-check.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
													<path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000" />
													<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									<!--end::Icon-->
									<!--begin::Content-->
									<div class="d-flex flex-column">
										<input type="number" class="form-control" name="jml_pickup_internal" id="jml_pickup_internal" style="background: transparent; border: none; font-size: 16pt; font-weight: bold;" readonly>
									</div>
									<!--end::Content-->
								</div>
							</div>
						</div>
						<!--end::Callout-->
					</div>
					<div class="col-lg-3">
						<!--begin::Callout-->
						<div class="card card-custom wave wave-animate wave-success mb-8 mb-lg-0">
							<div class="card-header border-0 pt-5 text-center">
								<h3 class="card-title font-weight-bolder">Jumlah Pickup Vendor</h3>
							</div>
							<div class="card-body">						
								<div class="d-flex align-items-center">
									<!--begin::Icon-->
									<div class="mr-3">
										<span class="svg-icon svg-icon-4x">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Clipboard-check.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
													<path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000" />
													<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									<!--end::Icon-->
									<!--begin::Content-->
									<div class="d-flex flex-column">
										<input type="number" class="form-control" name="jml_pickup_vendor" id="jml_pickup_vendor" style="background: transparent; border: none; font-size: 16pt; font-weight: bold;" readonly>
									</div>
									<!--end::Content-->
								</div>
							</div>
						</div>
						<!--end::Callout-->
					</div>
					<div class="col-lg-3">
						<!--begin::Callout-->
						<div class="card card-custom wave wave-animate wave-success mb-8 mb-lg-0">
							<div class="card-header border-0 pt-5 text-center">
								<h3 class="card-title font-weight-bolder">Jumlah Stt Created</h3>
							</div>
							<div class="card-body">						
								<div class="d-flex align-items-center">
									<!--begin::Icon-->
									<div class="mr-3">
										<span class="svg-icon svg-icon-4x">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Clipboard-check.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
													<path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000" />
													<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									<!--end::Icon-->
									<!--begin::Content-->
									<div class="d-flex flex-column">
										<input type="number" class="form-control" name="jml_stt_created" id="jml_stt_created" style="background: transparent; border: none; font-size: 16pt; font-weight: bold;" readonly>
									</div>
									<!--end::Content-->
								</div>
							</div>
						</div>
						<!--end::Callout-->
					</div>
				</div>
				<br><br>
				<div class="row">
					<canvas id="myChart1" class="col-md-6"></canvas>
					<canvas id="Sopir" class="col-md-6"></canvas>					
				</div>
			</div>
			<br><br>		
			<div class="row">
				<div class="col-xl-12">
					<canvas id="Mar1"></canvas>
				</div>
			</div>		
		</div>
		<?php echo $__env->make("metronic.js-dashboard", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->stopSection(); ?>
<?php echo $__env->make("metronic.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/dashboards.blade.php ENDPATH**/ ?>