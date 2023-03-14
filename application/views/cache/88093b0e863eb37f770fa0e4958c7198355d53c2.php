
<?php $__env->startSection("script"); ?>
<script type="text/javascript">

	$(document).ready(function(){
		$(document).on("click",".modal-body li a",function()
		{
			tab = $(this).attr("href");
			$(".modal-body .tab-content div").each(function(){
				$(this).removeClass("active");
			});
			$(".modal-body .tab-content "+tab).addClass("active");
		});
	});
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

	var a_schedule = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/schedule")); ?>';
	var a_pickup = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/detailpickup")); ?>';
	var a_reschedule = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/reschedule")); ?>';
	var a_update_tgl = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/updatetgl")); ?>';
	var a_receive = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/receive")); ?>';
	var a_check = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/check")); ?>';
	var a_addpenerima = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/addpenerima")); ?>';
	var a_sopir = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/changesopir")); ?>';
	var a_generate = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/generate")); ?>';
	var id_sopir = null;
	var role = '<?php echo e(get_instance()->session->userdata("role")); ?>';

	<?php if(get_instance()->session->userdata("role")=="3"): ?>
	id_sopir = '<?php echo e(get_instance()->session->userdata("user")); ?>';
	<?php endif; ?>

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
	bg[11] = "bg-success";

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
	icon[11] = "fas fa-check text-white";

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

	function popup(params) {
		$.ajax({
			url : '<?php echo e(base_url()); ?>bookings/popup/'+params,
			method : "POST",
			success :function(data){
				console.log(data);
				$('#div-detail').html(data);
				$('#modal-detail').modal('show');
			},
			error: function(q, w, e) {
				console.log(q.responseText)
			}
		});	
	}

	$(document).ready(function() {
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

	function getData() {
		var asal 		= $('#id_asal').val();
		var tujuan 		= $('#id_tujuan').val();
		var status 		= $('#id_status').val();
		var dr_tgl 		= $('#dr_tgl').val();
		var sp_tgl 		= $('#sp_tgl').val();
		var marketing 	= $('#id_marketing').val();
		var sopir 	= $('#id_sopir').val();
		const data = {id_asal:asal, id_tujuan:tujuan, id_status:status, dr_tgl: dr_tgl, sp_tgl : sp_tgl, marketing: marketing, id_sopir : sopir};

		$("#show_all").dataTable().fnDestroy();
		$('#show_all').DataTable({
			"responsive" : true,
			"processing": true,
			"serverSide": true,
			"ordering": true, 
			"order": [[ 0, 'asc' ]],
			"ajax":
			{
				"url": "<?php echo base_url() ?>bookings/get_booking",
				"type": "POST",
				"data": data,
			},
			"deferRender": true,
			"aLengthMenu": [[50, 100, 500],[ 50, 100, 500]],
			"columns": [
			{
				"render": function ( data, type, row ) { 
					return '<a href="#" onclick="popup('+row.id_bookingorder+')">'+row.kode_booking+'</a><br>'+row.created_at;
				}
			}, 
			{"data": 'nm_karyawan'},
			{ 
				"render": function ( data, type, row )
				{ 
					return '<a href="https://wa.me/'+fix_wa(row.hp_pengirim)+'" target="_blank" style="color:black; text-align:center;cursor: pointer;">'+row.nama_pengirim+'<br><label class="bg-primary" style="padding: 5px; cursor: pointer;border-radius:10px; color:white">'+row.hp_pengirim+'</label></a> '; 
				}
			},	
			{ 
				"render": function ( data, type, row ) { 
					return row.nama_kab_pengirim+', '+row.nama_kec_pengirim;
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
					return '<a href="https://wa.me/'+fix_wa(row.hp_penerima)+'" target="_blank" style="color:black; text-align:center;cursor: pointer;">'+row.nm_penerima+'<br><label class="bg-primary" style="padding: 5px;cursor: pointer; border-radius:10px; color:white">'+row.hp_penerima+'</label></a> ';
				}
			},
			{ 
				"render": function ( data, type, row ) { 
					var html = toDays(row.tgl_jemput)+', '+row.tgl_jemput;
					if (row.nm_ven != null) {
						html+= '<br><label class="bg-info text-white" style="padding: 5px; border-radius:10px;"><i class="fa fa-truck mr-1" style="color : white"></i> '+row.nm_ven+'</label><br>'
					}else{
						html+= '<br><label class="bg-warning text-white" style="padding: 5px; border-radius:10px;"><i class="fa fa-truck mr-1" style="color : white"></i> Belum ada vendor</label><br>'
					}
					if (row.id_ven == 0) {
						if (row.nm_sopir != null) {
							html+= '<label class="bg-success text-white" style="padding: 5px; border-radius:10px;"><i class="fa fa-user mr-1" style="color : white"></i> '+row.nm_sopir+'</label><br>'
						}else{
							html+= '<label class="bg-danger text-white" style="padding: 5px; border-radius:10px;"><i class="fa fa-user mr-1" style="color : white"></i> Kosong</label><br>'
						}
					}
					
					return html;
				}
			},
			{ 
				"render": function ( data, type, row )
				{ 
					var html = '<a href="#" onclick="cek('+row.id_bookingorder+')" class="text-white font-weight-bold"><label class="'+bg[row.id_bookingstatus]+'" style="padding: 5px; border-radius:10px;"><i class="'+icon[row.id_bookingstatus]+'" style="margin-right: 8px"></i>'+row.nama_status+'</label></a>';

					return html;
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

				if(role == "3"){
					if((row.id_bookingstatus >=3 && row.id_bookingstatus <=5) && a_pickup==true && (row.id_sopir==null || id_sopir== row.id_sopir)){
						html += '<a class="dropdown-item" href="#" onclick="pickup('+row.id_bookingorder+')"><span><i class="fa fa-truck mr-1"></i></span>Proses Penjemputan</a>';
					}
				}else{
					if((row.id_bookingstatus >=3 && row.id_bookingstatus <=5) && a_pickup==true && row.id_ven != '0'){
						html += '<a class="dropdown-item" href="#" onclick="pickup('+row.id_bookingorder+')"><span><i class="fa fa-truck mr-1"></i></span>Proses Penjemputan</a>';
					}
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

				if(row.id_bookingstatus == 5 && a_sopir==true){
					html += '<a class="dropdown-item" href="#" onclick="changesopir('+row.id_bookingorder+')"><span><i class="fa fa-user mr-1"></i></span>Ganti Sopir</a>';
				}

				if((row.id_bookingstatus == 8 || row.id_bookingstatus == 10) && a_check==true){
					html += '<a class="dropdown-item" href="<?php echo e(base_url()."bookings/check/"); ?>'+row.id_bookingorder+'"><span><i class="fa fa-check mr-1"></i></span>Check Penjemputan</a>';
				}
				
				if(row.kode_booking==null && a_generate==true){
					html += '<a class="dropdown-item" href="<?php echo e(base_url()."bookings/generate/"); ?>'+row.id_bookingorder+'"><span><i class="fa fa-retweet mr-1"></i></span>Generate Kode</a>';
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

function changesopir(id) {
	$("#form-sopir").attr("action", "<?php echo e(base_url()); ?>bookings/changesopir/"+id);
	$("#modal-sopir").modal("show");
}

</script>
<?php $__env->stopSection(); ?>
<?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/js-bookings.blade.php ENDPATH**/ ?>