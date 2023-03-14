<!DOCTYPE html>
<html lang="en">
<head>
	<base href="">
	<meta charset="utf-8" />
	<title>Aplikasi Booking Online || <?php echo e(get_instance()->config->item("nama_perush")); ?></title>
	<link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/lsjimage/lti.svg">
	<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

	<link href="<?php echo e(base_url()); ?>assets/metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(base_url()); ?>assets/metronic/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(base_url()); ?>assets/metronic/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo e(base_url()); ?>assets/metronic/css/style.bundle.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo e(base_url()); ?>assets/metronic/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(base_url()); ?>assets/metronic/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo e(base_url()); ?>assets/metronic/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(base_url()); ?>assets/metronic/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo e(base_url()); ?>assets/metronic/css/themes/layout/brand/light.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(base_url()); ?>assets/metronic/css/themes/layout/aside/light.css" rel="stylesheet" type="text/css" />
	
	<style type="text/css">
		.select2 {
			width:100%!important;
		}
	</style>
	<script>var KTAppSettings = [];</script>

	<script src="<?= base_url() ?>assets/metronic/plugins/global/plugins.bundle.js"></script>
	<script src="<?= base_url() ?>assets/metronic/js/scripts.bundle.js"></script>
	<script src="<?= base_url() ?>assets/metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
	<script src="<?= base_url() ?>assets/metronic/js/pages/widgets.js"></script>
</head>
<body>
	<div class="container">
		<div class="card card-custom gutter-b mt-3">
			<div class="card-body text-center">
				<a href="https://booking.lsjexpress.co.id/" class="header-logo">
					<img src="<?php echo e(base_url()); ?>assets/lsjimage/lti.svg" class="img-fluid rounded-normal" alt="logo" style="width: 100px;">
				</a>
				<h5 class="mt-3">
					<b><?php echo e(get_instance()->config->item('nama_perush')); ?></b>
				</h6>
				<h6 class="mt-3">Portal Booking Pengiriman Barang</h6>
			</div>
		</div>
		<div class="card card-custom gutter-b">
			<form method="POST" action="<?php echo e(base_url()); ?>landing/store" enctype="multipart/form-data" id="form-select">
				<div class="card-body row">
					<div class="col-md-12">
						<?php echo $__env->make("metronic.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>
					<div class="col-md-6">
						<label>Layanan
							<span class="text-danger">*</span>
						</label>

						<select class="form-control <?php if(form_error('id_layanan')!=null): ?> is-invalid <?php endif; ?>" id="id_layanan" name="id_layanan" required>
							<option value="">-- Pilih Layanan --</option>
							<?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($value->id_layanan); ?>"><?php echo e(strtoupper($value->nama_layanan)); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>

						<label class="text-danger"><?php echo form_error('id_layanan'); ?></label>
					</div>

					<div class="col-md-6">
						<label>Tgl. Penjemputan
							<span class="text-danger">*</span>
						</label>

						<input type="date"  class="form-control <?php if(form_error('tgl_jemput')!=null): ?> is-invalid <?php endif; ?>" id="tgl_jemput" name="tgl_jemput" value="<?php if(set_value('tgl_jemput')!=null): ?><?php echo e(set_value('tgl_jemput')); ?><?php endif; ?>" required>

						<label class="text-danger"><?php echo form_error('tgl_jemput'); ?></label>
					</div>

					<div class="col-md-12">
						<label><b> <span><i class="fa fa-user"></i></span> DATA PENGIRIM</b></label>
						<hr>
					</div>

					<div class="col-md-3">
						<label>Nama Pengirim
							<span class="text-danger">*</span>
						</label>

						<input type="text" minlength="4" maxlength="30" placeholder="masukan nama pengirim"  class="form-control <?php if(form_error('nm_pengirim')!=null): ?> is-invalid <?php endif; ?>" id="nm_pengirim" name="nm_pengirim" value="<?php if(set_value("nm_pengirim")!=null): ?><?php echo e(set_value("nm_pengirim")); ?><?php endif; ?>" required>

						<label class="text-danger"><?php echo form_error('nm_pengirim'); ?></label>
					</div>

					<div class="col-md-3">
						<label>No. Telp Pengirim
							<span class="text-danger">*</span>
						</label>

						<input type="number" step="any" minlength="10" maxlength="13" placeholder="masukan telp pengirim"  class="form-control <?php if(form_error('nohp_pengirim')!=null): ?> is-invalid <?php endif; ?>" id="nohp_pengirim" name="nohp_pengirim" value="<?php if(set_value("nohp_pengirim")!=null): ?><?php echo e(set_value("nohp_pengirim")); ?><?php endif; ?>" onKeyPress="if(this.value.length==13) return false;" required>

						<label class="text-danger"><?php echo form_error('nohp_pengirim'); ?></label>
					</div>

					<div class="col-md-3">
						<label>Wilayah Pengirim
							<span class="text-danger">*</span>
						</label>

						<select class="form-control <?php if(form_error('kec_pengirim')!=null): ?> is-invalid <?php endif; ?>" id="wil_asal" name="wil_asal" required></select>

						<label class="text-danger"><?php echo form_error('kec_pengirim'); ?></label>
					</div>

					<div class="col-md-3">
						<label>Alamat Penjemputan
							<span class="text-danger">*</span>
						</label>

						<textarea class="form-control <?php if(form_error('almt_pengirim')!=null): ?> is-invalid <?php endif; ?>" id="almt_pengirim" name="almt_pengirim" minlength="10" required><?php if(set_value("almt_pengirim")!=null): ?><?php echo e(set_value("almt_pengirim")); ?><?php endif; ?></textarea>

						<label class="text-danger"><?php echo form_error('almt_pengirim'); ?></label>
					</div>

					<div class="col-md-12">
						<label> <b><span><i class="fa fa-users"></i></span> DATA PENERIMA</b> </label>
						<hr>
					</div>

					<div class="col-md-3">
						<label>Nama Penerima
							<span class="text-danger">*</span>
						</label>

						<input type="text" minlength="4" maxlength="30" placeholder="masukan nama penerima"  class="form-control <?php if(form_error('nm_penerima')!=null): ?> is-invalid <?php endif; ?>" id="nm_penerima" name="nm_penerima" value="<?php if(set_value("nm_penerima")!=null): ?><?php echo e(set_value("nm_penerima")); ?><?php endif; ?>" required>

						<label class="text-danger"><?php echo form_error('nm_penerima'); ?></label>
					</div>

					<div class="col-md-3">
						<label>No. Telp Penerima
							<span class="text-danger">*</span>
						</label>

						<input type="number" step="any" minlength="10" maxlength="13" placeholder="masukan telp penerima"  class="form-control <?php if(form_error('nohp_penerima')!=null): ?> is-invalid <?php endif; ?>" id="nohp_penerima" name="nohp_penerima" value="<?php if(set_value("nohp_penerima")!=null): ?><?php echo e(set_value("nohp_penerima")); ?><?php endif; ?>" onKeyPress="if(this.value.length==13) return false;" required>

						<label class="text-danger"><?php echo form_error('nohp_penerima'); ?></label>
					</div>

					<div class="col-md-3">
						<label>Wilayah Penerima
							<span class="text-danger">*</span>
						</label>

						<select class="form-control <?php if(form_error('kec_penerima')!=null): ?> is-invalid <?php endif; ?>" id="wil_tujuan" name="wil_tujuan" required></select>
						<label class="text-danger"><?php echo form_error('kec_penerima'); ?></label>
					</div>

					<div class="col-md-3">
						<label>Alamat Penerima
							<span class="text-danger">*</span>
						</label>

						<textarea class="form-control <?php if(form_error('almt_penerima')!=null): ?> is-invalid <?php endif; ?>" id="almt_penerima" name="almt_penerima" minlength="10" required><?php if(set_value("almt_penerima")!=null): ?><?php echo e(set_value("almt_penerima")); ?><?php endif; ?></textarea>

						<label class="text-danger"><?php echo form_error('almt_penerima'); ?></label>
					</div>

					<div class="col-md-12">
						<label> <b><span><i class="fa fa-box"></i></span> DATA BARANG</b> </label>
						<hr>
					</div>

					<div class="col-md-3">
						<label>Estimasi Berat (Kg)
							<span class="text-danger">*</span>
						</label>

						<div class="input-group">
							<input type="number" step="any" id="n_brt" name="n_brt" maxlength="30"  class="form-control <?php if(form_error('n_brt')!=null): ?> is-invalid <?php endif; ?>" required placeholder="100,1 / kg" value="<?php if(set_value("n_brt")!=null): ?><?php echo e(set_value("n_brt")); ?><?php endif; ?>">
							<div class="input-group-prepend">
								<span class="input-group-text">Kg</span>
							</div>
						</div>
						<label class="text-danger"><?php echo form_error('n_brt'); ?></label>
					</div>

					<div class="col-md-3">
						<label>Estimasi Kilo Volume (Kgv)</label>
						<div class="input-group">
							<input type="number" step="any" id="n_vol" name="n_vol" maxlength="30"  class="form-control <?php if(form_error('n_vol')!=null): ?> is-invalid <?php endif; ?>"  placeholder="100,1 Kgv" value="<?php if(set_value("n_vol")!=null): ?><?php echo e(set_value("n_vol")); ?><?php endif; ?>">

							<div class="input-group-prepend">
								<span class="input-group-text">Kgv</span>
							</div>
						</div>
						<label class="text-danger"><?php echo form_error('n_vol'); ?></label>
					</div>

					<div class="col-md-3">
						<label>Estimasi Kubik (M3)</label>
						<div class="input-group">
							<input type="number" step="any" id="n_kubik" name="n_kubik" maxlength="30"  class="form-control <?php if(form_error('n_kubik')!=null): ?> is-invalid <?php endif; ?>" placeholder="100,1 M3" value="<?php if(set_value("n_kubik")!=null): ?><?php echo e(set_value("n_kubik")); ?><?php endif; ?>">

							<div class="input-group-prepend">
								<span class="input-group-text">M3</span>
							</div>
						</div>
						<label class="text-danger"><?php echo form_error('n_vol'); ?></label>
					</div>

					<div class="col-md-3">
						<label>Jumlah Koli
							<span class="text-danger">*</span>
						</label>

						<div class="input-group">
							<input type="number" id="n_koli" name="n_koli" maxlength="30"  class="form-control <?php if(form_error('n_koli')!=null): ?> is-invalid <?php endif; ?>" value="<?php if(set_value("n_koli")!=null): ?><?php echo e(set_value("n_koli")); ?><?php endif; ?>" placeholder="100 Koli">
							<div class="input-group-prepend">

								<span class="input-group-text">Koli</span>
							</div>
						</div>

						<label class="text-danger"><?php echo form_error('n_koli'); ?></label>
					</div>

					<div class="col-md-4">
						<label>Jenis Barang
							<span class="text-danger">*</span>
						</label>

						<input type="text" id="jns_barang" name="jns_barang" maxlength="30"  class="form-control <?php if(form_error('jns_barang')!=null): ?> is-invalid <?php endif; ?>" placeholder="Bahan Makanan" value="<?php if(set_value("jns_barang")!=null): ?><?php echo e(set_value("jns_barang")); ?><?php endif; ?>">

						<label class="text-danger"><?php echo form_error('jns_barang'); ?></label>
					</div>

					<div class="col-md-4">
						<label> Asuransi & Packing </label><br>
						<label class="form-control-label" for="asuransi">
							<input type="checkbox" name="asuransi" value="1" id="asuransi" checked=""> Asuransi
						</label>

						<label class="form-control-label ml-5" for="packing">
							<input type="checkbox" name="packing" value="1" id="packing"> Packing 
						</label>

						<label class="text-danger"><?php echo form_error('asuransi'); ?></label>
						<label class="text-danger"><?php echo form_error('packing'); ?></label>
					</div>

					<div class="col-md-4">
						<label>Captcha
							<span class="text-danger">*</span>
						</label>

						<?php echo $captcha; ?>


						<input type="text" name="captcha" id="captcha" placeholder="masukan captcha" class="form-control" minlength="5" maxlength="5" required>

						<label class="text-danger"><?php echo form_error('captcha'); ?> </label>
					</div>

					<div class="col-md-12">
						<label>Keterangan Barang
							<span class="text-danger">*</span>
						</label>

						<textarea class="form-control <?php if(form_error('keterangan')!=null): ?> is-invalid <?php endif; ?>" id="keterangan" name="keterangan" minlength="5" required maxlength="100"><?php if(set_value("keterangan")!=null): ?><?php echo e(set_value("keterangan")); ?><?php endif; ?></textarea>

						<label class="text-danger"><?php echo form_error('keterangan'); ?> </label>
					</div>
				</div>

				

				<div id="div-hide">
					<input type="hidden" name="kec_pengirim" id="kec_pengirim">
					<input type="hidden" name="text_kec_pengirim" id="text_kec_pengirim">
					<input type="hidden" name="kec_penerima" id="kec_penerima">
					<input type="hidden" name="text_kec_penerima" id="text_kec_penerima">
				</div>
				<div class="card-footer text-right">
					<button type="submit" class="btn btn-sm" style="background-color: #00a811; color: white" data-toggle="tooltip" data-placement="top" title="Simpan Data">
						<i class="fa fa-save" style="color: white"></i> Simpan
					</button>
					<a href="<?php echo e(base_url()); ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Batal"><i class="fa fa-times"></i> Batal</a>
				</div>
			</form>
		</div>
	</div>
	<!-- Start of Qontak Webchat Script -->
	<script>
		const qchatInit = document.createElement('script');
		qchatInit.src = "https://webchat.qontak.com/qchatInitialize.js";
		const qchatWidget = document.createElement('script');
		qchatWidget.src = "https://webchat.qontak.com/js/app.js";
		document.head.prepend(qchatInit);
		document.head.prepend(qchatWidget);
		qchatInit.onload = function () {qchatInitialize({ id: '451d772a-33f4-440f-b3ad-4ca25889b98c', code: '40aiLBZaQKYiokTHL00jg' })};
	</script>
	<!-- End of Qontak Webchat Script -->
</body>
<script type="text/javascript">
	<?php if(set_value("id_layanan")!=null): ?>
	$("#id_layanan").val('<?php echo e(set_value("id_layanan")); ?>');
	<?php endif; ?>

	<?php if(set_value("asuransi")=="1"): ?>
	$('#asuransi').prop('checked', true);
	<?php endif; ?>

	<?php if(set_value("packing")=="1"): ?>
	$('#packing').prop('checked', true);
	<?php endif; ?>

	var today = new Date().toISOString().split('T')[0];
	$("#tgl_jemput").val(today);
	
	$.ajax({
		url : "<?php echo base_url() ?>landing/newwilayah",
		method : "POST",
		success :function(data){
			$("#wil_asal").select2({
				data: data,
				width: 'auto'
			});

			$("#wil_tujuan").select2({
				data: data,
				width: 'auto'
			});
		},
		error: function(q, w, e) {
			alert(e)
			console.log(q.responseText)
		}
	});
	
	$('#wil_asal').on('change', function() {
		$("#kec_pengirim").val(this.value);
		$("#text_kec_pengirim").val($("#wil_asal option:selected").text());
	});

	$('#wil_tujuan').on('change', function() {
		$("#kec_penerima").val(this.value);
		$("#text_kec_penerima").val($("#wil_tujuan option:selected").text());
	});
	
	<?php if(set_value("kec_pengirim")!=null and set_value("text_kec_pengirim")!=null): ?>
		$("#kec_pengirim").val('<?php echo e(set_value("kec_pengirim")); ?>');
		$("#text_kec_pengirim").val('<?php echo e(set_value("text_kec_pengirim")); ?>');

		$("#wil_asal").append('<option value="<?php echo e(set_value("kec_pengirim")); ?>"><?php echo e(set_value("text_kec_pengirim")); ?></option>');

		$("#wil_asal").val('<?php echo e(set_value("kec_pengirim")); ?>');
	<?php endif; ?>
	
	<?php if(set_value("kec_penerima")!=null and set_value("text_kec_penerima")!=null): ?>
		$("#kec_penerima").val('<?php echo e(set_value("kec_penerima")); ?>');
		$("#text_kec_penerima").val('<?php echo e(set_value("text_kec_penerima")); ?>');
		
		$("#wil_tujuan").append('<option value="<?php echo e(set_value("kec_penerima")); ?>"><?php echo e(set_value("text_kec_penerima")); ?></option>');
		
		$("#wil_tujuan").val('<?php echo e(set_value("kec_penerima")); ?>');
	<?php endif; ?>


</script>
</html><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/landing.blade.php ENDPATH**/ ?>