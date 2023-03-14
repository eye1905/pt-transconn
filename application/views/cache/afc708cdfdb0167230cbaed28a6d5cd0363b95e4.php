

<?php $__env->startSection("content"); ?>

<div class="card card-custom gutter-b">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Data Menus</h3>
		</div>
	</div>

	<div class="card-body">
		
		<?php echo $__env->make("metronic.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<form method="GET" action="<?php echo base_url() ?>menus/index" enctype="multipart/form-data" id="form-select">
			<div class="row">
				<div class="col-md-12">
					<div class="text-right">
						<div class="text-right">
							<a href="<?php echo base_url() ?>menus/create" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Tambah Menu">
								<i class="fa fa-plus"></i> Tambah Menu
							</a>
						</div>
					</div>
					<table class="table table-hover mt-2">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Position</th>
								<th scope="col">Nama Menu</th>
								<th scope="col">uri</th>
								<th scope="col">Icon</th>
								<th scope="col">Controller</th>
								<th scope="col">Level</th>
								<th scope="col">Is Aktif</th>
								<th>Position</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($data)<1): ?>
							<tr>
								<td class="text-center" colspan="6"><b>Data Kosong</b></td>
							</tr>
							<?php endif; ?>

							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($value->position); ?></td>
								<td><?php echo e($value->nm_menu); ?></td>
								<td><?php echo e($value->uri); ?></td>
								<td><?php echo e($value->icon); ?></td>
								<td><?php echo e($value->controller); ?></td>
								<td><?php echo e($value->level); ?></td>
								<td>
									<?php if($value->is_aktif == "1"): ?>
									<i class="text-success fa fa-check"> </i>
									<?php else: ?>
									<i class="text-danger fa fa-times"> </i>
									<?php endif; ?>
								</td>
								<td><?php echo e($value->position); ?></td>
								<td>
									<a href="<?php echo e(base_url().'menus/up/'.$value->id_menu); ?>" class="btn btn-sm btn-info" style="color: #fff" data-toggle="tooltip" data-placement="bottom" title="Up Menu">
										<i class="fa fa-arrow-up"></i>
									</a>
									<a href="<?php echo e(base_url().'menus/down/'.$value->id_menu); ?>" class="btn btn-sm btn-info" style="color: #fff" data-toggle="tooltip" data-placement="bottom" title="Down Menu">
										<i class="fa fa-arrow-down"></i>
									</a>
									
									<a href="<?php echo e(base_url().'menus/detail/'.$value->id_menu); ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="detail">
										<i class="fa fa-eye"></i>
									</a>

									<a href="<?php echo e(base_url().'menus/edit/'.$value->id_menu); ?>" class="btn btn-sm btn-warning" style="color: #fff" data-toggle="tooltip" data-placement="bottom" title="Edit">
										<i class="fa fa-edit"></i>
									</a>
									
									<button class="btn btn-sm btn-danger" type="button" onclick="CheckDelete('<?php echo e(base_url().'menus/delete/'.$value->id_menu); ?>')" data-toggle="tooltip" data-placement="bottom" title="Delete">
										<i class="fa fa-times"></i>
									</button>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>			
			</div>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
<script type="text/javascript">

	<?php if(isset($filter["select"]) and $filter["select"] != null): ?>
	$("#select").val('<?php echo e($filter["select"]); ?>');
	<?php endif; ?>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("metronic.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/menus.blade.php ENDPATH**/ ?>