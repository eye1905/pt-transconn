<div class="row">
	<div class="col-md-12">
		<label> 
			<b><span class="mr-2"><i class="fas fa-wallet"></i></span>Detail Koli Penjemputan</b> 
		</label>
		<hr>
		<div class="text-right">
			<button class="btn btn-sm btn-success" type="button" onclick="cek('<?php echo e(get_instance()->uri->segment(3)); ?>')">
				<span><i class="fa fa-eye"></i> </span> Detail Status
			</button>
			<?php if(get_instance()->Rolemenumodel->checkuri("bookings/savekoli") and get_instance()->uri->segment(2)!="check"): ?>
			<button class="btn btn-sm btn-primary" type="button" onclick="goPopUp()">
				<span><i class="fa fa-plus"></i> </span> Tambah Detail Koli
			</button>
			<?php endif; ?>
		</div>
	</div>

	<div class="col-md-12 mt-2">
		<table class="table table-hover table-responsive"> 
			<thead class="thead-dark">
				<tr>
					<th>No. </th>
					<th>Jumlah Koli</th>
					<th>Dimensi (P x L x T)</th>
					<th>Berat (Kg)</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if(count($koli)<1): ?>
				<tr>
					<td colspan="6" class="text-center">
						<b>Data Koli Kosong</b>
					</td>
				</tr>
				<?php endif; ?>
				<form method="GET" action="" enctype="multipart/form-data" id="form-select">
					<?php $__currentLoopData = $koli; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($key+1); ?></td>
						<td><?php echo e($value->jml_koli); ?></td>
						<td><?php echo e($value->panjang."x".$value->lebar."x".$value->tinggi."( CM ) "); ?></td>
						<td><?php echo e($value->berat); ?></td>
						<td>
							<center>
								<a href="#" onclick="goEdit('<?php echo e($value->id_detail_koli); ?>', '<?php echo e($value->jml_koli); ?>', '<?php echo e($value->panjang); ?>', '<?php echo e($value->lebar); ?>', '<?php echo e($value->tinggi); ?>', '<?php echo e($value->berat); ?>')" class="btn btn-sm btn-warning" style="color: #fff" data-toggle="tooltip" data-placement="bottom" title="Edit">
									<i class="fa fa-edit"></i>
								</a>

								<?php if(get_instance()->uri->segment(2)!="check"): ?>
								<button class="btn btn-sm btn-danger" id="hapus" type="button" onclick="CheckDelete('<?php echo e(base_url().'pickup/deletekoli/'.$value->id_detail_koli); ?>')" data-toggle="tooltip" data-placement="bottom" title="Delete">
									<i class="fa fa-times"></i>
								</button>
								<?php endif; ?>
							</center>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</form>
			</tbody>
		</table>
	</div>
</div><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/table-koli.blade.php ENDPATH**/ ?>