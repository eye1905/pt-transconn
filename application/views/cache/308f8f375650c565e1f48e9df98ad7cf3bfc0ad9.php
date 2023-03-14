
<?php $__env->startSection("content"); ?>
<style type="text/css">
	.modal-fullscreen .modal-dialog {
		width: auto;
		min-width: 100%;
		height: 100%;
		margin-left: 1%;
	}

	.modal-fullscreen .modal-content {
		height: auto;
		min-height: 100%;
	}
</style>
<div class="card card-custom gutter-b">
	<div class="card-header card-header-tabs-line">
		<div class="card-toolbar">
			<ul class="nav nav-tabs nav-bold nav-tabs-line">
				<li class="nav-item">
					<a class="nav-link active">
						<span class="nav-icon">
							<i class="flaticon2-chat-1"></i>
						</span>
						<span class="nav-text">Booking Tanpa Marketing</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="card-body">
		<?php echo $__env->make("metronic.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="tab-content">
			<div class="tab-pane fade active show" id="#" role="tabpanel" aria-labelledby="#">
				<div class="mb-7">
					<div class="row align-items-center">
						<div class="col-lg-12 col-xl-12">
							<div class="row align-items-center">
								<?php echo $__env->make("metronic.filter.filter-booking-tanpa-marketing", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</div>
						</div>
					</div>
				</div>
				<div>
					<table class="table table-responsive" id="show_all">
						<thead class="thead-dark">
							<tr>
								<th class="text-white">Kode Booking</th>
								<th class="text-white">Nama Pengirim</th>
								<th class="text-white">Wilayah Asal</th>
								<th class="text-white">Nama Penerima</th>
								<th class="text-white">Wilayah Tujuan</th>
								<th class="text-white">Status</th>
								<th class="text-white">Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-body" id="div-status"></div>
	</div>
</div>

<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-body">
				<div id="div-detail"></div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<?php echo $__env->make("metronic.js-booking-tanpa-marketing", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("metronic.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/booking-tanpa-marketing.blade.php ENDPATH**/ ?>