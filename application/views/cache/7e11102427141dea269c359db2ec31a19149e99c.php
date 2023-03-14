
<?php $__env->startSection("content"); ?>
<h2>Data Transaksi</h2>
<p>Data Transaksi ini adalah detail dari Data utama</p>
<div class="text-end">
	<a href="<?php echo e(base_url().'/transaction/create'); ?>" class="btn btn-sm btn-primary">Tambah</a>
</div>
<?php echo $__env->make("trans.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<form method="GET" action="<?php echo e(base_url()); ?>" enctype="multipart/form-data" id="form-select">
	<table class="table table-responsive table-stripped">
		<thead>
			<tr>
				<th>No. </th>
				<th>Kode Transaksi</th>
				<th>Item</th>
				<th>Qty</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e(($key+1)); ?></td>
				<td><?php echo e($value->no_transaction); ?></td>
				<td><?php echo e($value->total); ?></td>
				<td ><?php echo e($value->qty); ?></td>
				<td class="text-center">
					<a href="<?php echo e(base_url().'transaction/show/'.$value->id); ?>" class="btn btn-sm btn-info">View</a>
					<a href="<?php echo e(base_url().'transaction/edit/'.$value->id); ?>"  class="btn btn-sm btn-warning">Edit</a>
					<a href="#" onclick="CheckDelete('<?php echo e(base_url().'transaction/delete/'.$value->id); ?>')" class="btn btn-sm btn-danger">Delete</a>
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("trans.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\trans\application\views/trans/index.blade.php ENDPATH**/ ?>