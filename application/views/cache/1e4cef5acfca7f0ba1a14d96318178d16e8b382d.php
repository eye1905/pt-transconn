

<?php $__env->startSection("filter"); ?>

<div class="col-md-3 form-group">
	<label>Role
		<span class="text-danger">*</span>
	</label>
	<select class="form-control" id="f_id_role" name="f_id_role">
		<option value="">Pilih Role</option>
		<?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($value->id_role); ?>"><?php echo e(strtoupper($value->nama_role)); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
</div>

<div class="col-md-3 form-group">
	<label>Nama Karyawan
		<span class="text-danger">*</span>
	</label>
	<select class="form-control" id="f_id_karyawan" name="f_id_karyawan"></select>
</div>

<div class="col-md-6 text-left" style="padding-top: 30px;">
	<button type="submit" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Cari Data">
		<i class="fa fa-search"></i> Cari
	</button>

	<a href="<?= base_url() ?>user" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Refresh Halaman">
		<i class="fas fa-undo"></i> Refresh
	</a>

	<a href="<?= base_url() ?>user/create" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Tambah User">
		<i class="fa fa-plus"></i> Tambah User
	</a>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("metronic.filter.collapse", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/filter/filter-user.blade.php ENDPATH**/ ?>