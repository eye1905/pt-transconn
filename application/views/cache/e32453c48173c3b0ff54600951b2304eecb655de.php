
<?php $__env->startSection("content"); ?>
<div class="card card-custom gutter-b">
	<div class="card-header card-header-tabs-line">
		<div class="card-toolbar">
			<ul class="nav nav-tabs nav-bold nav-tabs-line">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
						<span class="nav-icon">
							<i class="flaticon2-chat-1"></i>
						</span>
						<?php if(get_instance()->uri->segment(1) == 'pickup'): ?>
						<span class="nav-text">Pickup Internal</span>
						<?php else: ?>
						<span class="nav-text">Pickup Vendor</span>
						<?php endif; ?>
					</a>
				</li>
			</ul>
		</div>
		<div class="card-toolbar">
			<div class="text-right">
				<?php if(get_instance()->Rolemenumodel->checkuri("bookings/laporan_pdf")): ?>
				<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-print"></i> Cetak Laporan</button>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="card-body">
		<?php echo $__env->make("metronic.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="tab-content">
			<div class="tab-pane fade active show" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
				<div class="mb-7">
					<div class="row align-items-center">
						<div class="col-lg-12 col-xl-12">
							<div class="row align-items-center">
								<?php echo $__env->make("metronic.filter.filter-booking", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table" id="show_all">
						<thead class="thead-dark">
							<tr>
								<th class="text-white">Kode Booking</th>
								<th class="text-white">Marketing</th>
								<th class="text-white">Nama Pengirim</th>
								<th class="text-white">Wilayah Asal</th>
								<th class="text-white">Wilayah Tujuan</th>
								<th class="text-white">Nama Penerima</th>
								<th class="text-white">Tgl Jemput</th>
								<th class="text-white">Sopir</th>
								<th class="text-white">Status</th>
								<th class="text-white">Opsi</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-body" id="div-status"></div>
		</div>
	</div>
	
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title tex-center">Cetak Laporan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url() ?>bookings/laporan_pdf" method="post">
					<div class="modal-body">

						<div class="row">
							<div class="col-md-6">
								<label>
									Dari Tanggal
								</label>
								<input type="date" class="form-control" name="dr_tgl" id="dr_tgl" >
							</div>
							
							<div class="col-md-6">
								<label>
									Sampai Tanggal
								</label>
								<input type="date" class="form-control" name="sp_tgl" id="sp_tgl" >
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<label>Marketing
									<span class="text-danger">*</span>
								</label>
								
								<select class="form-control <?php if(form_error('id_user')!=null): ?> is-invalid <?php endif; ?>" id="id_user" name="id_user">
									<option value="">-- Pilih Marketing --</option>
									<?php $__currentLoopData = $marketing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($value->id_karyawan); ?>"><?php echo e(strtoupper($value->nm_karyawan)); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								
								<label class="text-danger">
									<?php echo form_error('id_user'); ?>
								</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Cetak</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-jemput" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form method="POST" action="#" enctype="multipart/form-data" id="form-jemput">
				<div class="modal-body">
					<center>
						<h5 id="text-modal">Apakah Anda Ingin Proses Penjemputan ?</h5>
					</center>
					<br>
					<div class="row">
						
						<div class="col-md-12" id="div-p-vendor">
							<label>Vendor
								<span class="text-danger">*</span>
							</label>
							
							<select class="form-control <?php if(form_error('p-vendor')!=null): ?> is-invalid <?php endif; ?>" id="p-vendor" name="p-vendor" required>
								<option value="">-- Pilih Vendor --</option>
								<?php $__currentLoopData = $vendor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($value->id_ven); ?>"><?php echo e(strtoupper($value->nm_ven)); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
							
							<label class="text-danger"><?php echo form_error('p-vendor'); ?></label>
						</div>

						<div class="col-md-12" id="div-p-tgl_jemput_pelanggan">
							<label>Rencana Penjemputan Pelanggan
								<span class="text-danger">*</span>
							</label>
							
							<input type="date" class="form-control" disabled id="tgl_pelanggan" name="tgl_pelanggan" value="">
						</div>

						<div class="col-md-12" id="div-p-tgl_jemput">
							<label>Rencana Penjemputan Sopir
								<span class="text-danger">*</span>
							</label>
							
							<input type="date" class="form-control" id="tgl_jemput" name="tgl_jemput" placeholder="Masukan Rencana Tanggal Jemput" value="<?php echo e(date("Y-m-d")); ?>">
							
							<label class="text-danger"><?php echo form_error('tgl_jemput'); ?></label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-sm btn-success font-weight-bold">
						<i class="fas fa-check"></i> Iya
					</button>
					<button type="button" class="btn btn-sm btn-danger font-weight-bold" data-dismiss="modal">
						<i class="fas fa-times"></i> Tidak
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<?php echo $__env->make("metronic.stt/js-stt", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("metronic.js-notifikasi", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("metronic.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/stt/stt.blade.php ENDPATH**/ ?>