<?php $__env->startSection("script"); ?>
<script type="text/javascript">
	
	<?php if(get_instance()->session->userdata('user') != null): ?>
	$("#id_user").val('<?php echo e(get_instance()->session->userdata('user')); ?>');
	<?php endif; ?>
	
	var today = new Date().toISOString().split('T')[0];
	$("#tgl_jemput").val(today);
	
	$('input[type=radio][name=c_hitung]').change(function() {
		setTarif();
	});
	
	$("#n_harga").on("change", function(e) {
		setTarif();
	});

	$("#harga_lain").on("change", function(e) {
		setTarif();
	});
	
	$("#n_brt").on("change", function(e) {
		setTarif();
	});
	
	$("#n_vol").on("change", function(e) {
		setTarif();
	});
	
	$("#n_kubik").on("change", function(e) {
		setTarif();
	});
	
	function setTarif() {
		var jml = 0;
		var tarif = $("#n_harga").val();
		var lain = $("#harga_lain").val();
		var c_hitung = $("input[name='c_hitung']:checked").val();
		
		if(c_hitung==1){
			jml = parseFloat($("#n_brt" ).val());
		}else if(c_hitung==2){
			jml = parseFloat($("#n_vol" ).val());
		}else if(c_hitung==3){
			jml = parseFloat($("#n_kubik" ).val());
		}else{	
			jml = 1;
		}
		
		if(isNaN(jml)){
			jml = 1;
		}
		
		if(isNaN(tarif)){
			tarif = 0;
		}

		if(isNaN(lain)){
			lain = 0;
		}
		
		console.log(jml);
		console.log(tarif);
		
		var total = parseFloat(jml*tarif);
		var nilai = parseInt(total)+parseInt(lain);
		$("#n_total").val(nilai);
	}
	
	function Rupiah(nilai) {
		var bilangan = nilai;
		var	number_string = bilangan.toString(),
		sisa 	= number_string.length % 3,
		rupiah 	= number_string.substr(0, sisa),
		ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
		
		
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		return rupiah;
	}
	
	<?php if(set_value("id_layanan")!=null): ?>
	$("#id_layanan").val('<?php echo e(set_value("id_layanan")); ?>');
	<?php endif; ?>
	
	<?php if(set_value("id_user")!=null): ?>
	$("#id_user").val('<?php echo e(set_value("id_user")); ?>');
	<?php endif; ?>
	
	<?php if(set_value("chkpengirim")!=null and set_value("chkpengirim")=="1"): ?>
	$("#chkpengirim").attr('checked', 'checked');
	<?php endif; ?>
	
	<?php if(set_value("chkpenerima")!=null and set_value("chkpenerima")=="1"): ?>
	$("#chkpenerima").attr('checked', 'checked');
	<?php endif; ?>
	
	<?php if(set_value("c_hitung")!=null): ?>
	<?php if(set_value("c_hitung")=="1"): ?>
	$("input[name=c_hitung][value='1']").attr('checked', 'checked');
	<?php elseif(set_value("c_hitung")=="2"): ?>
	$("input[name=c_hitung][value='2']").attr('checked', 'checked');
	<?php elseif(set_value("c_hitung")=="3"): ?>
	$("input[name=c_hitung][value='3']").attr('checked', 'checked');
	<?php endif; ?> 
	<?php endif; ?>
	
	<?php if(set_value("asuransi")!=null and set_value("asuransi")=="1"): ?>
	$("#asuransi").attr('checked', 'checked');
	<?php endif; ?>
	
	<?php if(set_value("packing")!=null and set_value("packing")=="1"): ?>
	$("#packing").attr('checked', 'checked');
	<?php endif; ?>
	
	let apiUrl = "<?php echo base_url() ?>landing/newwilayah";
	
	$.ajax({
		url : apiUrl,
		method : "POST",
		success :function(data){
			console.log(data);
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
<?php $__env->stopSection(); ?>
<?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/js-create-booking.blade.php ENDPATH**/ ?>