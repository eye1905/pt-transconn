<div class="modal fade" id="modalip" tabindex="-1" role="dialog" aria-labelledby="ModalWhiteList" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Form Tambah detail koli</h4>
			</div>
			<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="" id="form_ip" enctype="multipart/form-data">
				<input type="hidden" name="_method" id="ip_method" value="GET">
				<div class="modal-body row">
					
					<input type="hidden" name="id_bookingorder" id="id_bookingorder" value="<?php echo e(get_instance()->uri->segment(3)); ?>">

					<div class="col-md-3">
						<label>Jumlah Koli
							<span class="text-danger">*</span>
						</label>

						<input type="number" id="n_detail_koli" name="n_detail_koli" maxlength="30"  class="form-control <?php if(form_error('n_detail_koli')!=null): ?> is-invalid <?php endif; ?>" required placeholder="1 Koli">

						<label class="text-danger"><?php echo form_error('n_detail_koli'); ?></label>
					</div>

					<div class="col-md-3">
						<label>Berat (Kg)
							<span class="text-danger">*</span>
						</label>

						<input type="number" step="any" id="n_detail_brt" name="n_detail_brt" maxlength="30"  class="form-control <?php if(form_error('n_detail_brt')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 / kg">

						<label class="text-danger"><?php echo form_error('n_detail_brt'); ?></label>
					</div>

					<div class="col-md-2">
						<label>Panjang (Cm)
							<span class="text-danger">*</span>
						</label>

						<input type="number" step="any" id="n_detail_pjg" name="n_detail_pjg" maxlength="30"  class="form-control <?php if(form_error('n_detail_pjg')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 Cm">

						<label class="text-danger"><?php echo form_error('n_detail_pjg'); ?></label>
					</div>

					<div class="col-md-2">
						<label>Lebar (Cm)
							<span class="text-danger">*</span>
						</label>

						<input type="number" step="any" id="n_detail_lbr" name="n_detail_lbr" maxlength="30"  class="form-control <?php if(form_error('n_detail_lbr')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 Cm">

						<label class="text-danger"><?php echo form_error('n_detail_lbr'); ?></label>
					</div>

					<div class="col-md-2">
						<label>Tinggi (Cm)
							<span class="text-danger">*</span>
						</label>

						<input type="number" step="any" id="n_detail_tng" name="n_detail_tng" maxlength="30"  class="form-control <?php if(form_error('n_detail_tng')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 Cm">

						<label class="text-danger"><?php echo form_error('n_detail_tng'); ?></label>
					</div>

				</div>
				<div class="modal-footer">
					<?php if(get_instance()->Rolemenumodel->checkuri("bookings/savekoli")): ?>
					<button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-save"> </i> Simpan</button>
					<?php endif; ?>
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/modal-koli.blade.php ENDPATH**/ ?>