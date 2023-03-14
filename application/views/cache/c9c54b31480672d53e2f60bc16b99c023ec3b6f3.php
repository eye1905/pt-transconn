

<?php $__env->startSection("content"); ?>
<h2>Data Transaksi</h2>
<p>Data Transaksi ini adalah detail dari Data utama</p> 
<form method="POST" id="form-transaction" action="<?php echo e(base_url()."transaction/update/".$data->id); ?>" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">
			<?php if(get_instance()->uri->segment(2)=="show"): ?>
			<div class="text-end">
				<a href="<?php echo e(base_url()); ?>" class="btn btn-sm btn-warning">Kembali</a>
			</div>
			<?php endif; ?>
			<?php echo $__env->make("trans.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<table class="table" id="table-transaction">
				<tr>
					<td>
						No Transaction : 
						<input type="text" readonly  class="form-control <?php if(form_error('no_transaction')!=null): ?> is-invalid <?php endif; ?>" id="no_transaction" name="no_transaction" value="<?php if(set_value("no_transaction")!=null): ?><?php echo e(set_value("no_transaction")); ?><?php elseif(isset($data->no_transaction)): ?><?php echo e($data->no_transaction); ?><?php endif; ?>" required>
						<label class="text-danger"><?php echo form_error('no_transaction'); ?></label>
					</td>
					<td>
						Transaction Date :
						<input type="date"  class="form-control <?php if(form_error('transaction_date')!=null): ?> is-invalid <?php endif; ?>" id="transaction_date" name="transaction_date" value="<?php if(set_value("transaction_date")!=null): ?><?php echo e(set_value("transaction_date")); ?><?php elseif(isset($data->transaction_date)): ?><?php echo e($data->transaction_date); ?><?php endif; ?>" required>
						<label class="text-danger"><?php echo form_error('transaction_date'); ?></label> 
					</td>
				</tr>
			</table>
			<h3>Detail Item</h3>
			<?php if(get_instance()->uri->segment(2)=="edit"): ?>
			<div class="text-end">
				<button class="btn btn-sm btn-primary" type="button" onclick="goAdd()">Tambah Detail</button>
			</div>
			<?php endif; ?>
			<table class="table" id="table-detail">
				<?php if(isset($detail) and $detail>=1): ?>
				<?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td>
						Item Name : 
						<input type="text"  class="form-control" id="item" name="item[]" value="<?php echo e($value->item); ?>">
					</td>
					<td>
						Quantity : 
						<input type="number"   class="form-control" id="qty" name="qty[]" value="<?php echo e($value->quantity); ?>">
					</td>
					<td>
						<?php if(get_instance()->uri->segment(2)=="edit"): ?>
						<button type="button" onclick="goDelete($(this))" class="btn btn-sm btn-danger mt-4">X</button>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
				<tr>
					<td>
						Item Name : 
						<input type="text"  class="form-control" id="item" name="item[]" value="">
					</td>
					<td>
						Quantity : 
						<input type="number"   class="form-control" id="qty" name="qty[]" value="">
					</td>
					<td>
						<?php if(get_instance()->uri->segment(2)=="edit"): ?>
						<button type="button" onclick="goDelete($(this))" class="btn btn-sm btn-danger mt-4">X</button>
						<?php endif; ?>
					</td>
				</tr>
				<?php endif; ?>
			</table>
		</div>
		<?php if(get_instance()->uri->segment(2)=="edit"): ?>
		<div class="col-md-12 text-end mt-4">
			<button type="submit" class="btn btn-sm btn-success">Simpan</button>
			<a href="<?php echo e(base_url()); ?>" class="btn btn-sm btn-warning">Batal</a>
		</div> 
		<?php endif; ?>
	</div>
</form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
<script type="text/javascript">
<?php if(get_instance()->uri->segment(2)=="edit"): ?>
	function goAdd(){
		$("#table-detail").append('<tr><td>Item Name : <input type="text"  class="form-control" id="item" name="item[]" value=""></td><td>Quantity : <input type="number"   class="form-control" id="qty" name="qty[]" value=""></td><td><button type="button" onclick="goDelete($(this))" class="btn btn-sm btn-danger mt-4">X</button></td></tr>');
	}
	function goDelete(row)
	{
		row.closest('tr').remove();
	}
<?php else: ?>
$(".form-control").prop("disabled", true );
<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("trans.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pt-transconn\application\views/trans/edit.blade.php ENDPATH**/ ?>