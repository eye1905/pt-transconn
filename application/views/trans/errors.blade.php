
@if(get_instance()->session->flashdata('errors')!=null)
<div class="alert alert-custom alert-danger fade show pb-2" role="alert">
	<div class="alert-text"><?= get_instance()->session->flashdata('errors'); ?></div>
</div>
@endif

@if(get_instance()->session->flashdata('success')!=null)
<div class="alert alert-custom alert-success fade show pb-2" role="alert">
	<div class="alert-text"><?= get_instance()->session->flashdata('success'); ?></div>
</div>
@endif