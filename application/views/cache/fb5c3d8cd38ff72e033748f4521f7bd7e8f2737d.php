

<?php $__env->startSection("content"); ?>

<div class="card card-custom gutter-b">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Data User</h3>
		</div>
	</div>

	<div class="card-body">
		
		<?php echo $__env->make("metronic.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		<form method="GET" action="<?php echo base_url() ?>user/index" enctype="multipart/form-data" id="form-select">
			<?php echo $__env->make("metronic.filter.filter-user", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<table class="table table-hover mb-3 mt-1">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama Karyawan</th>
						<th scope="col">Username</th>
						<th scope="col">Role User</th>
						<th scope="col">Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($data)<1): ?>
					<tr>
						<td class="text-center" colspan="5"><b>Data Kosong</b></td>
					</tr>
					<?php endif; ?>

					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($key+1); ?></td>
						<td><?php echo e($value->nm_karyawan); ?></td>
						<td><?php echo e($value->username); ?></td>
						<td><?php echo e($value->nama_role); ?></td>
						<td><?php echo inc_dropdown($value->id_user); ?></td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<?php echo $__env->make('metronic.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
<script type="text/javascript">
	
	$('#f_id_karyawan').select2({
		placeholder: 'Cari Karyawan ....',
		ajax: {
			url: '<?php echo base_url('user/getKaryawan'); ?>',
			minimumInputLength: 3,
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				$('#f_id_karyawan').empty();
				return {
					results:  $.map(data, function (item) {
						return {
							text: item.value,
							id: item.kode
						}
					})
				};
			},
			cache: true
		}
	});

	<?php if(isset($filter["f_id_role"]) and $filter["f_id_role"] != null): ?>
	$("#f_id_role").val('<?php echo e($filter["f_id_role"]); ?>');
	<?php endif; ?>

	<?php if(isset($filter["select"]) and $filter["select"] != null): ?>
	$("#select").val('<?php echo e($filter["select"]); ?>');
	<?php endif; ?>

	<?php if(isset($filter["f_id_karyawan"]["id_karyawan"]) and $filter["f_id_karyawan"]["id_karyawan"] != null): ?>
	$("#f_id_karyawan").empty();
	$("#f_id_karyawan").append('<option value="<?php echo e($filter["f_id_karyawan"]["id_karyawan"]); ?>"><?php echo e(strtoupper($filter["f_id_karyawan"]["nm_karyawan"])); ?></option>');
	<?php endif; ?>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("metronic.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/user.blade.php ENDPATH**/ ?>