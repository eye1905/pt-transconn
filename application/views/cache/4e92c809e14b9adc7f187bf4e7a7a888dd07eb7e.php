<div class="col-md-3 mt-2">
	<label>Asal:</label>
	<select class="form-control" id="id_asal">
		<option value="">All</option>
	</select>
</div>

<div class="col-md-3 mt-2">
	<label>Tujuan:</label>
	<select class="form-control" id="id_tujuan">
		<option value="">All</option>
	</select>
</div>

<div class="col-md-3 mt-2">
	<label>Marketing: </label>
	<select class="form-control" id="id_marketing">
		<option value="">All</option>
		<?php $__currentLoopData = $marketing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($value->id_user); ?>"><?php echo e($value->nm_karyawan); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
</div>

<div class="col-md-3 mt-2">
	<label>Sopir: </label>
	<select class="form-control" id="id_sopir">
		<option value="">All</option>
		<?php $__currentLoopData = $sopir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($value->id_user); ?>"><?php echo e($value->nm_karyawan); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
</div>

<div class="col-md-3 mt-2">
	<label>Tanggal Penjemputan Awal : </label>
	<input type="date" name="dr_tgl" id="dr_tgl" class="form-control">
</div>

<div class="col-md-3 mt-2">
	<label>Tanggal Penjemputan Awal :</label>
	<input type="date" name="sp_tgl" id="sp_tgl" class="form-control">
</div>

<div class="col-md-3 mt-2">
	<label>Status:</label>
	<select class="form-control" id="id_status">
		<option value="">All</option>
		<?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($value->id_bookingstatus>1): ?>
		<option value="<?php echo e($value->id_bookingstatus); ?>"><?php echo e($value->nama_status); ?></option>
		<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
</div>

<div class="col-md-12 text-right mt-2">
	<button class="btn btn-sm btn-success" id="bt-filter">
		<i class="fa fa-search"></i> Cari
	</button>
	<a href="<?php echo e(base_url()); ?>/bookings" class="btn btn-sm btn-warning">
		<i class="fa fa-times"></i> Reset
	</a>
</div>
<?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/filter/filter-booking.blade.php ENDPATH**/ ?>