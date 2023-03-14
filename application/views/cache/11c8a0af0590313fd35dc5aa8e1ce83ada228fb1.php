
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
						<span class="nav-text">Pengantaran</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="card-toolbar">
			<div class="text-right">
				<?php if(get_instance()->Rolemenumodel->checkuri("bookings/laporan_pdf")): ?>
				<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalFilterBerjalan"><i class="fa fa-plus"></i> Create Pengantaran</button>
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
					<table class="table table-striped table-sm" id="show_all">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tgl Pengantaran</th>
								<th>No DM</th>
								<th>Vendor Tujuan</th>
								<th>Status</th>
								<th>Action</th>
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

	<div id="ModalFilterBerjalan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="standard-modalLabel">Tambah Pengantaran</h4>
				</div>
				<div class="modal-body col-12">
					<form class="row" id="formKiri">
						<input type="hidden" name="id" id="id">
						<div class="col-md-6 mt-2">
							<label>Tanggal:</label>
							<input type="date" name="tgl_pengantaran" id="tgl_pengantaran" class="form-control" value="<?php echo e(date("Y-m-d")); ?>">
						</div>
						<div class="col-md-6 mt-2">
							<label>Vendor Tujuan:</label>
							<input type="text" name="nm_vendor" id="nm_vendor" class="form-control">
						</div>

						<div class="col-md-4 mt-2">
							<label>No DM :</label>
							<input type="text" name="no_dm" id="no_dm" class="form-control">
						</div>

						<div class="col-md-4 mt-2">
							<label>Jumlah Stt :</label>
							<input type="number" name="total_stt" id="total_stt" class="form-control">
						</div>

						<div class="col-md-4 mt-2">
							<label>Total Koli :</label>
							<input type="number" name="total_koli" id="total_koli" class="form-control">
						</div>

						<div class="col-md-4 mt-2">
							<label>Total (Kg) :</label>
							<input type="text" name="total_kg" id="total_kg" class="form-control">
						</div>

						<div class="col-md-4 mt-2">
							<label>Total (KgV) :</label>
							<input type="number" name="total_kgv" id="total_kgv" class="form-control">
						</div>

						<div class="col-md-4 mt-2">
							<label>Total (M3) :</label>
							<input type="number" name="total_m3" id="total_m3" class="form-control">
						</div>

						<div class="col-md-12 mt-2">
							<label>Keterangan :</label>
							<textarea type="text" name="keterangan" id="keterangan" class="form-control"></textarea>
						</div>
						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
					<button type="button" class="btn btn-primary" onclick="simpan_data()">Simpan</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</div>

	<div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="standard-modalLabel">Detail Pengantaran</h4>
				</div>
				<div class="modal-body col-12">
					<form class="row" id="formKiri">
						<div class="col-md-6 mt-2">
							<label>Tanggal:</label>
							<input type="date" name="d_tgl_pengantaran" id="d_tgl_pengantaran" class="form-control" disabled>
						</div>
						<div class="col-md-6 mt-2">
							<label>Vendor Tujuan:</label>
							<input type="text" name="d_nm_vendor" id="d_nm_vendor" class="form-control" disabled>
						</div>

						<div class="col-md-4 mt-2">
							<label>No DM :</label>
							<input type="text" name="d_no_dm" id="d_no_dm" class="form-control" disabled>
						</div>

						<div class="col-md-4 mt-2">
							<label>Jumlah Stt :</label>
							<input type="number" name="d_total_stt" id="d_total_stt" class="form-control" disabled>
						</div>

						<div class="col-md-4 mt-2">
							<label>Total Koli :</label>
							<input type="number" name="" id="d_total_koli" class="form-control" disabled>
						</div>

						<div class="col-md-4 mt-2">
							<label>Total (Kg) :</label>
							<input type="text" name="d_total_kg" id="d_total_kg" class="form-control" disabled>
						</div>

						<div class="col-md-4 mt-2">
							<label>Total (KgV) :</label>
							<input type="number" name="d_total_kgv" id="d_total_kgv" class="form-control" disabled>
						</div>

						<div class="col-md-4 mt-2">
							<label>Total (M3) :</label>
							<input type="number" name="d_total_m3" id="d_total_m3" class="form-control" disabled>
						</div>

						<div class="col-md-12 mt-2">
							<label>Keterangan :</label>
							<textarea type="text" name="d_keterangan" id="d_keterangan" class="form-control" disabled></textarea>
						</div>
						<br>
						<div class="col-md-12">							
							<div class="row" id="fotonya"></div>
						</div>						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</div>

	<div id="ModalFoto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="standard-modalLabel">Pengiriman Selesai</h4>
				</div>
				<div class="modal-body col-12">
					<form class="row" id="upload_foto" method="POST" action="<?php echo e(base_url()); ?>pengantaran/save_foto" enctype="multipart/form-data">
						<div class="col-md-12 mt-2">
							<label>Upload Foto :</label>
							<input type="hidden" name="id_pengantaran" id="id_pengantaran">
							<input type="file" multiple name="foto[]" id="foto[]" class="form-control">
						</div>
						

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
						<input type="submit" class="btn btn-primary" name="Simpan">
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
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

	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
	<?php echo $__env->make("metronic.pengantaran/js-pengantaran", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make("metronic.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/pengantaran/pengantaran.blade.php ENDPATH**/ ?>