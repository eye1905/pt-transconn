
<?php if(get_instance()->session->flashdata('errors')!=null): ?>
<div class="alert alert-custom alert-danger fade show pb-2" role="alert">
	<div class="alert-text"><?= get_instance()->session->flashdata('errors'); ?></div>
	<div class="alert-close">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="ki ki-close"></i></span>
		</button>
	</div>
</div>
<?php endif; ?>

<?php if(get_instance()->session->flashdata('success')!=null): ?>
<div class="alert alert-custom alert-success fade show pb-2" role="alert">
	<div class="alert-text"><?= get_instance()->session->flashdata('success'); ?></div>
	<div class="alert-close">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="ki ki-close"></i></span>
		</button>
	</div>
</div>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/errors.blade.php ENDPATH**/ ?>