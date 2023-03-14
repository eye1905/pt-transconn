

<?php $__env->startSection("content"); ?>

<div class="card card-custom gutter-b">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Detail Check Penjemputan Booking</h3>
		</div>
	</div>
	
	<div class="card-body">
		<?php echo $__env->make("metronic.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="<?php echo e(base_url()); ?>bookings/savecheck/<?php echo e(get_instance()->uri->segment(3)); ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<label> <b><span><i class="fa fa-box"></i></span>
					Form Check Penjemputan Booking</b> 
				</label>
				<br>
				
				<label class="text-danger">
					* Pastikan Jumlah Koli, Berat, Kilo Volume ataupun Kubik Dimensi Barang Benar.
				</label>
				<hr>
			</div>

			<div class="col-md-3">
				<label>Koli Penjemputan
					<span class="text-danger">*</span>
				</label>

				<div class="input-group">
					<input type="number" step="any" id="n_koli" name="n_koli" maxlength="30"  class="form-control <?php if(form_error('n_koli')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 / kg">
					<div class="input-group-prepend">
						<span class="input-group-text">Koli</span>
					</div>
				</div>
				<label class="text-danger"><?php echo form_error('n_koli'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Berat Penjemputan (Kg)
					<span class="text-danger">*</span>
				</label>

				<div class="input-group">
					<input type="number" step="any" id="n_brt" name="n_brt" maxlength="30"  class="form-control <?php if(form_error('n_brt')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 / kg">
					<div class="input-group-prepend">
						<span class="input-group-text">Kg</span>
					</div>
				</div>
				<label class="text-danger"><?php echo form_error('n_brt'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Kilo Volume Penjemputan (Kgv)
					<span class="text-danger">*</span>
				</label>

				<div class="input-group">
					<input type="number" step="any" id="n_vol" name="n_vol" maxlength="30"  class="form-control <?php if(form_error('n_vol')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 Kgv">
					<div class="input-group-prepend">
						<span class="input-group-text">Kgv</span>
					</div>
				</div>

				<label class="text-danger"><?php echo form_error('n_vol'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Kubik Penjemputan (M3)
					<span class="text-danger">*</span>
				</label>

				<div class="input-group">
					<input type="number" step="any" id="n_kubik" name="n_kubik" maxlength="30"  class="form-control <?php if(form_error('n_kubik')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 M3">
					<div class="input-group-prepend">
						<span class="input-group-text">M3</span>
					</div>
				</div>

				<label class="text-danger"><?php echo form_error('n_vol'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Keterangan Penjemputan
					<span class="text-danger">*</span>
				</label>

				<textarea class="form-control <?php if(form_error('keterangan')!=null): ?> is-invalid <?php endif; ?>" id="keterangan" name="keterangan" minlength="5" required maxlength="100" required><?php if(set_value("keterangan")!=null): ?><?php echo e(set_value("keterangan")); ?><?php endif; ?></textarea>

				<label class="text-danger"><?php echo form_error('keterangan'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Bukti Foto Penjemputan
					<span class="text-danger"></span>
				</label>
				
				<input type="file" multiple class="form-control <?php if(form_error('gambar')!=null): ?> is-invalid <?php endif; ?>" name="foto[]" id="foto[]" >
				<label class="text-warning">(Minimal 1 - Maximal 3)</label>
				
				<label class="text-danger"><?php echo form_error('gambar'); ?></label>
			</div>

			<div class="col-md-3">
				<label>Status Penjemputan <span class="text-danger">*</span></label><br>
				<label class="form-control-label" for="n_status"> 
					<input type="radio" name="n_status" value="9" id="n_status" checked=""> Completed
				</label>

				<label class="form-control-label ml-5" for="n_status">
					<input type="radio" name="n_status" value="10" id="n_status"> Suspended
				</label>

				<label class="text-danger"><?php echo form_error('n_status'); ?></label>
			</div>
			
			<div class="col-md-3">
				<button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Simpan Data">
					<i class="fa fa-save"></i> Simpan
				</button>

				<a href="<?php echo e(base_url()); ?>bookings" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Kembali">
					<i class="fas fa-backward"></i> Kembali
				</a>
			</div>
		</div>
	</form>
	<br>
	<?php echo $__env->make("metronic.table-koli", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</div>
<?php echo $__env->make("metronic.modal-koli", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-body" id="div-status"></div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">

	<?php if(isset($detail->est_koli)): ?>
	$("#n_koli").val('<?php echo e($detail->est_koli); ?>');
	<?php endif; ?>

	<?php if(isset($detail->est_berat)): ?>
	$("#n_brt").val('<?php echo e($detail->est_berat); ?>');
	<?php endif; ?>

	<?php if(isset($detail->est_volume)): ?>
	$("#n_vol").val('<?php echo e($detail->est_volume); ?>');
	<?php endif; ?>

	<?php if(isset($detail->est_kgv)): ?>
	$("#n_kubik").val('<?php echo e($detail->est_kgv); ?>');
	<?php endif; ?>
	
	function goPopUp(){
		$("#n_detail_koli").val("");
		$("#n_detail_pjg").val("");
		$("#n_detail_lbr").val("");
		$("#n_detail_tng").val("");
		$("#n_detail_brt").val("");

		$("#form_ip").attr("action", "<?php echo e(base_url()); ?>bookings/savekoli");
		$("#modalip").modal("show");
	}

	function goEdit(id, jml, pjg, lbr, tng, brt){
		$("#n_detail_koli").val(jml);
		$("#n_detail_pjg").val(pjg);
		$("#n_detail_lbr").val(lbr);
		$("#n_detail_tng").val(tng);
		$("#n_detail_brt").val(brt);

		$("#form_ip").attr("action", "<?php echo e(base_url()); ?>bookings/savekoli/"+id);
		$("#modalip").modal("show");
	}
	
	function cek(params) {
		$.ajax({
			url : '<?php echo e(base_url()); ?>bookings/detailstatus/'+params,
			method : "POST",
			success :function(data){
				$('#div-status').html(data);
				$('#exampleModal').modal('show'); 
			},
			error: function(q, w, e) {
				console.log(q.responseText)
			}
		});	
	}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("metronic.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/check-bookings.blade.php ENDPATH**/ ?>