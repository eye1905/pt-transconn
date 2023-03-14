
<?php $__env->startSection("script"); ?>
<script type="text/javascript">
	function toDays($date) {
		var weekday = ["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"];
		var a = new Date($date);
		return weekday[a.getDay()];
	}

	function fix_wa(data) {
		var str = data
		str = setCharAt(str,0,'62');
		return str;
	}

	function setCharAt(str,index,chr) {
		if(index > str.length-1) return str;
		return str.substring(0,index) + chr + str.substring(index+1);
	}

	var url_g = document.URL+'/create_stt'; 

	var a_schedule = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/schedule")); ?>';
	var a_pickup = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/detailpickup")); ?>';
	console.log("aa", a_pickup);
	var a_reschedule = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/reschedule")); ?>';
	var a_update_tgl = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/updatetgl")); ?>';
	var a_receive = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/receive")); ?>';
	var a_check = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/check")); ?>';
	var a_addpenerima = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/addpenerima")); ?>';
	var a_stt = '<?php echo e(get_instance()->Rolemenumodel->checkuri("pickup/create_stt")); ?>';
	console.log('cek ',a_stt);

	var bg = [];
	bg[1] = "bg-warning";
	bg[2] = "bg-success";
	bg[3] = "bg-primary";
	bg[4] = "bg-info";
	bg[5] = "bg-primary";
	bg[6] = "bg-success";
	bg[7] = "bg-danger";
	bg[8] = "bg-info";
	bg[9] = "bg-success";
	bg[10] = "bg-warning";
	bg[11] = "bg-info";

	var icon = [];
	icon[1] = "fas fa-arrow-down text-white";
	icon[2] = "fas fa-check text-white";
	icon[3] = "fas fa-stopwatch text-white";
	icon[4] = "far fa-clock text-white";
	icon[5] = "fas fa-truck text-white";
	icon[6] = "fas fa-check text-white";
	icon[7] = "fas fa-times text-white";
	icon[8] = "far fa-calendar-check text-white";
	icon[9] = "fas fa-check text-white";
	icon[10] = "fas fa-arrow-up text-white";

	function cek(params) {
		$.ajax({
			url : '<?php echo e(base_url()); ?>bookings/detailstatus/'+params,
			method : "POST",
			success :function(data){
				$('#div-status').html(data);
				$('#exampleModal').modal('show'); 
			},
			error: function(q, w, e) {
				console.log(q.responseText)
			}
		});	
	}

	$(document).ready(function() {
		var date = new Date();
		var currentDate = date.toISOString().substring(0,10);

		document.getElementById('f_dr_tgl').value = currentDate;
		document.getElementById('f_sp_tgl').value = currentDate;
		getData();
	});

	function cetak_laporan(params) {
		$('#filter_laporan').modal('show'); 
	}

	let apiUrl = "<?php echo base_url() ?>landing/newwilayah";
	$.ajax({
		url : apiUrl,
		method : "POST",
		success :function(data){
			$("#id_asal").select2({
				data: data,
				width: 'auto'
			});
			$("#id_tujuan").select2({
				data: data,
				width: 'auto'
			});
		},
		error: function(q, w, e) {
			console.log(q.responseText)
		}
	});

	$("#bt-filter").click(function(){
		getData();
	});

	$("#bt-reset").click(function(){
		$("#id_asal").select2().select2('val','0');
		$('#id_tujuan').select2().select2('val','0');
		$('#id_status').select2().select2('val','0');
		$('#dr_tgl').val(null);
		$('#sp_tgl').val(null);
		$('#id_marketing').select2().select2('val','0');
		$('#id_sopir').select2().select2('val','0');
		
		getData();
	});
	
	var uri = document.URL+'/get_data';
	var url = document.URL;
	var parts = url.split('/');
	var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash

	console.log("url ",uri);
	console.log(lastSegment);
	function getData() {
		var asal 		= $('#id_asal').val();
		var tujuan 		= $('#id_tujuan').val();
		var status 		= $('#id_status').val();
		var dr_tgl 		= $('#dr_tgl').val();
		var sp_tgl 		= $('#sp_tgl').val();
		var marketing 	= $('#id_marketing').val();
		var sopir 		= $('#id_sopir').val();
		var vendor 		= $('#id_ven').val();
		const data = {id_asal:asal, id_tujuan:tujuan, id_status:status, dr_tgl: dr_tgl, sp_tgl : sp_tgl, marketing: marketing, id_sopir : sopir, id_ven : vendor};

		$("#show_all").dataTable().fnDestroy();
		$('#show_all').DataTable({
			"responsive" : true,
			"processing": true,
			"serverSide": true,
			"ordering": true, 
			"order": [[ 0, 'asc' ]],
			"ajax":
			{
				"url": uri,
				"type": "POST",
				"data": data,
			},
			"deferRender": true,
			"aLengthMenu": [[10, 50, 100, 500],[10, 50, 100, 500]],
			"columns": [
			{ 
				"render": function ( data, type, row ) { 
					return '<a href="<?php echo e(base_url()."bookings/detail/"); ?>'+row.id_bookingorder+'" >'+row.kode_booking+'<br>'+toDays(row.created_at)+', '+row.created_at+'</a>';
				}
			}, 
			{"data": 'nm_karyawan'},
			{ 
				"render": function ( data, type, row )
				{ 
					return '<a href="https://wa.me/'+fix_wa(row.hp_pengirim)+'" target="_blank" style="color:black; text-align:center">'+row.nama_pengirim+'<br><label class="bg-primary" style="padding: 5px; border-radius:10px; color:white">'+row.hp_pengirim+'</label></a> ';
				}
			},	
			{ 
				"render": function ( data, type, row ) { 
					return row.nama_kab_pengirim+', '+row.nama_kec_pengirim;
				}
			},
			{ 
				"render": function ( data, type, row ) { 
					return row.nm_ven;
				}
			},
			{ 
				"render": function ( data, type, row ) { 
					return row.nama_kab_penerima+', '+row.nama_kec_penerima;
				}
			},
			{
				"render": function ( data, type, row )
				{ 
					return '<a href="https://wa.me/'+fix_wa(row.hp_penerima)+'" target="_blank" style="color:black; text-align:center">'+row.nm_penerima+'<br><label class="bg-primary" style="padding: 5px; border-radius:10px; color:white">'+row.hp_penerima+'</label></a> ';
				}
			},
			{ 
				"render": function ( data, type, row ) { 
					return toDays(row.tgl_jemput)+', '+row.tgl_jemput;
				}
			},	
			{"data": 'nm_sopir'},
			{ 
				"render": function ( data, type, row )
				{ 
					return '<a href="#" onclick="cek('+row.id_bookingorder+')" class="text-white font-weight-bold"><label class="'+bg[row.id_bookingstatus]+'" style="padding: 5px; border-radius:10px;"><i class="'+icon[row.id_bookingstatus]+'" style="margin-right: 8px"></i>'+row.nama_status+'</label></a>';
				}
			},
			{"render": function ( data, type, row )
			{ 
				var html = '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button><div class="dropdown-menu">';

				if(a_addpenerima==true){
					html += '<a class="dropdown-item" href="<?php echo e(base_url()."bookings/addpenerima/"); ?>'+row.id_bookingorder+'"><span><i class="fa fa-users mr-1"></i></span> Tambah Penerima</a>';
				}

				if(row.id_bookingstatus ==2 && a_schedule==true){
					html += '<a class="dropdown-item" href="#" onclick="schedule('+row.id_bookingorder+',\'' + row.tgl_jemput + '\')"><span><i class="fa fa-truck mr-1"></i></span>Atur Penjemputan</a>';
				}

				if((row.id_bookingstatus >=3 && row.id_bookingstatus <5) && a_pickup==true && lastSegment != 'pickup'){
					html += '<a class="dropdown-item" href="#" onclick="pickup('+row.id_bookingorder+')"><span><i class="fa fa-truck mr-1"></i></span>Proses Penjemputan</a>';
				}

				// if((row.id_bookingstatus ==3 || row.id_bookingstatus ==5) && a_update_tgl==true){
				// 	html += '<a class="dropdown-item" href="#" onclick="update_tgl('+row.id_bookingorder+', \'' + row.tgl_jemput + '\')"><span><i class="fa fa-calendar-check mr-1"></i></span>Atur Ulang Tgl Penjemputan</a>';
				// }

				if((row.id_bookingstatus ==7 || row.id_bookingstatus ==5 || row.id_bookingstatus ==3 || row.id_bookingstatus ==4) && a_reschedule==true){
					html += '<a class="dropdown-item" href="#" onclick="reschedule('+row.id_bookingorder+', \'' + row.tgl_jemput + '\')"><span><i class="fa fa-truck mr-1"></i></span>Reschedule Penjemputan</a>';
				}

				if(row.id_bookingstatus == 6 && a_receive==true){
					html += '<a class="dropdown-item" href="#" onclick="receive('+row.id_bookingorder+')"><span><i class="fa fa-check mr-1"></i></span>Sampai Di Gudang</a>';
				}

				if((row.id_bookingstatus == 8 || row.id_bookingstatus == 10) && a_check==true){
					html += '<a class="dropdown-item" href="<?php echo e(base_url()."bookings/check/"); ?>'+row.id_bookingorder+'"><span><i class="fa fa-check mr-1"></i></span>Check Penjemputan</a>';
				}

				if((row.id_bookingstatus == 9) && a_stt == true){
					html += '<a class="dropdown-item" href="'+url_g+'/'+row.id_bookingorder+'"><span><i class="fa fa-check mr-1"></i></span>Create STT</a>';
				}
				
				html+= '<a class="dropdown-item" href="<?php echo e(base_url()."bookings/detail/"); ?>'+row.id_bookingorder+'"><span><i class="fa fa-box mr-1"></i></span> Detail Booking</a><a class="dropdown-item" onclick="cek('+row.id_bookingorder+')" href="#"><span><i class="fa fa-eye mr-1"></i></span> Detail Status</a>';
				
				if(row.uniq_resi != null){
					html += '<a class="dropdown-item text-blue" href="<?php echo e(base_url()."rp/"); ?>'+row.uniq_resi+'" target="_blank"><span><i class="fa fa-box mr-1"></i></span> Public Resi</a>';
				}

				return html
			}
		},					
		],
	});
}

function schedule(id, tgl) {
	$("#modal-jemput").modal("show");
	$("#text-modal").text("Apakah Anda Ingin mengatur Penjemputan booking");
	$("#form-jemput").attr("action", "<?php echo e(base_url()); ?>bookings/schedule/"+id);
	$("#tgl_pelanggan").val(tgl);
	$("#div-p-tgl_jemput").show();
	$("#div-p-tgl_jemput_pelanggan").show();
	$("#tgl_jemput").val(tgl);
}

function reschedule(id, tgl) {
	$("#modal-jemput").modal("show");
	$("#text-modal").text("Apakah Anda Ingin mengatur ulang Penjemputan booking");
	$("#form-jemput").attr("action", "<?php echo e(base_url()); ?>bookings/reschedule/"+id);
	$("#tgl_pelanggan").val(tgl);
	$("#div-p-tgl_jemput").show();
	$("#div-p-tgl_jemput_pelanggan").show();
	$("#tgl_jemput").val(tgl);
}

function update_tgl(id, tgl) {
	$("#modal-jemput").modal("show");
	$("#text-modal").text("Apakah Anda Ingin mengatur ulang Penjemputan booking");
	$("#form-jemput").attr("action", "<?php echo e(base_url()); ?>bookings/updatetgl/"+id);
	$("#tgl_pelanggan").val(tgl);
	$("#div-p-tgl_jemput").show();
	$("#div-p-tgl_jemput_pelanggan").show();
	$("#tgl_jemput").val(tgl);
}

function pickup(id) {
	$("#div-p-vendor").hide();
	$("#p-vendor").removeAttr("required");
	$("#modal-jemput").modal("show");
	$("#text-modal").text("Apakah Anda Ingin memproses Penjemputan booking");
	$("#form-jemput").attr("action", "<?php echo e(base_url()); ?>bookings/pickup/"+id);
	$("#div-p-tgl_jemput").hide();
	$("#div-p-tgl_jemput_pelanggan").hide();
}

function receive(id) {
	$("#div-p-vendor").hide();
	$("#p-vendor").removeAttr("required");
	$("#modal-jemput").modal("show");
	$("#text-modal").text("Apakah barang sudah sampai gudang ?");
	$("#form-jemput").attr("action", "<?php echo e(base_url()); ?>bookings/receive/"+id);
	$("#div-p-tgl_jemput").hide();
	$("#div-p-tgl_jemput_pelanggan").hide();
}

</script>
<?php $__env->stopSection(); ?>
<?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/pickup/js-pickup.blade.php ENDPATH**/ ?>