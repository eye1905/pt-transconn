<div class="col-md-4">
	<label>Asal:</label>
	<select class="form-control" id="id_asal">
		<option value="">All</option>
	</select>
</div>

<div class="col-md-4">
	<label>Tujuan:</label>
	<select class="form-control" id="id_tujuan">
		<option value="">All</option>
	</select>
</div>

<div class="col-md-4">
	<label>Layanan:</label>
	<select class="form-control" id="id_layanan" name="id_layanan" required>
		<option value="">-- Pilih Layanan --</option>
		<?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($value->id_layanan); ?>"><?php echo e(strtoupper($value->nama_layanan)); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
</div>

<div class="col-md-4">
	<label>Dari Tanggal:</label>
	<input type="date" name="dr_tgl" id="dr_tgl" class="form-control">
</div>

<div class="col-md-4">
	<label >Sampai Tanggal:</label>
	<input type="date" name="sp_tgl" id="sp_tgl" class="form-control">
</div>

<div class="col-md-4 mt-6">
	<button class="btn btn-sm btn-success" id="bt-filter">
		<i class="fa fa-search"></i> Cari
	</button>
	<a href="<?php echo e(base_url()); ?>/bookingall" class="btn btn-sm btn-warning">
		<i class="fa fa-times"></i> Reset
	</a>
</div>
<?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/filter/filter-booking-tanpa-marketing.blade.php ENDPATH**/ ?>