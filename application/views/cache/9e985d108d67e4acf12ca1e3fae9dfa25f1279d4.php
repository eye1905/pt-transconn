
<?php $__env->startSection("script"); ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
	var uri = document.URL+'/get_data';
	console.log("url ",uri);

	var a_schedule = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/schedule")); ?>';
	var a_pickup = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/detailpickup")); ?>';
	var a_reschedule = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/reschedule")); ?>';
	var a_receive = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/receive")); ?>';
	var a_check = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/check")); ?>';
	var a_addpenerima = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookings/addpenerima")); ?>';
	var a_stt = '<?php echo e(get_instance()->Rolemenumodel->checkuri("pickup/create_stt")); ?>';
	console.log('cek ',a_stt);

	var bg = [];
	var tabel = null;

	bg[1] = "bg-success";
	bg[2] = "bg-primary";
	bg[3] = "bg-info";

	var icon = [];
	icon[1] = "fas fa-stopwatch text-white";
	icon[2] = "fas fa-truck text-white";
	icon[3] = "fas fa-check text-white";

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
		getData();
		$(document).find(`#id_ven`).select2();		
		
	});



	function cetak_laporan(params) {
		$('#filter_laporan').modal('show'); 
	}


	$("#bt-filter").click(function(){
		table.dataTable().fnDestroy();
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

		table = $('#show_all').DataTable({
			"responsive" : true,
			"processing": true,
			"serverSide": true,
			"ordering": true, 
			"order": [[ 0, 'desc' ]],
			"ajax":
			{
				"url": "<?php echo base_url() ?>pengantaran/get_data",
				"type": "POST",
				"data": data,
			},
			"deferRender": true,
			"aLengthMenu": [[5, 10, 50],[ 5, 10, 50]],
			"columns": [
			{"data": 'id'},
			{"data": 'tgl_pengantaran'},
			{"data": 'no_dm'},
			{"data": 'nm_vendor'},
			{ 
				"render": function ( data, type, row )
				{ 
					return '<a href="#" onclick="cek('+row.id+')" class="text-white font-weight-bold"><label class="'+bg[row.id_status]+'" style="padding: 5px; border-radius:10px;"><i class="'+icon[row.id_status]+'" style="margin-right: 8px"></i>'+row.nm_status+'</label></a>';
				}
			},	
			{ 
				"render": function ( data, type, row )
				{ 
					var html = '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button><div class="dropdown-menu">';

					if(row.id_status == 1 ){
						html += '<a class="dropdown-item" href="#" onclick="berangkat('+row.id+')"><span><i class="fa fa-truck mr-1"></i></span>Pengantaran Berangkat</a><a class="dropdown-item" href="#" onclick="edit('+row.id+')"><span><i class="fa fa-check mr-1"></i></span>Edit</a>';
					}
					if(row.id_status == 2 ){
						html += '<a class="dropdown-item" href="#" onclick="selesai('+row.id+')"><span><i class="fa fa-check mr-1"></i></span>Pengantaran Selesai</a>';
					}

					html+= '<a class="dropdown-item" onclick="detail('+row.id+')"><span><i class="fa fa-box mr-1"></i></span> Detail Pengantaran</a>';

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

	function berangkat(argument) {
		Swal.fire({
			title: 'Pengantaran Berangkat ?',
			showDenyButton: true,
			confirmButtonText: 'Berangkat',
			denyButtonText: `Batal`,
		}).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.isConfirmed) {
				do_berangkat(argument)
				table.ajax.reload();
			} else if (result.isDenied) {
				Swal.fire('Gagal', '')
			}
		})
	}

	// function selesai(argument) {
	// 	Swal.fire({
	// 		title: 'Pengantaran Selesai ?',
	// 		showDenyButton: true,
	// 		confirmButtonText: 'Selesai',
	// 		denyButtonText: `Batal`,
	// 	}).then((result) => {
	// 		 Read more about isConfirmed, isDenied below 
	// 		if (result.isConfirmed) {
	// 			do_selesai(argument)
	// 			table.ajax.reload();
	// 		} else if (result.isDenied) {
	// 			Swal.fire('Gagal', '')
	// 		}
	// 	})
	// }

	function selesai(argument) {
		$("#id_pengantaran").val(argument);
		$("#ModalFoto").modal("show");
	}

	function hapus(argument) {
		Swal.fire({
			title: 'Hapus Data ?',
			showDenyButton: true,
			confirmButtonText: 'Hapus',
			denyButtonText: `Batal`,
		}).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.isConfirmed) {
				do_delete(argument)
				table.ajax.reload();
			} else if (result.isDenied) {
				Swal.fire('Gagal', '')
			}
		})
	}

	function simpan_data() {
		var datanya = $("#formKiri").serializeArray();
		console.log(datanya);
		$.ajax({
			type: "POST",
			url: "<?=base_url('Pengantaran/save_pengantaran')?>",
			data: datanya,
			dataType: "JSON",
			success: function(data){
				console.log(data);
				if(data){
					Swal.fire({
						icon: 'success',
						title: 'Berhasil',
						text: 'Pengantaran Berhasil Dibuat',
						footer: '<a href="#">Tambah Data Lagi ?</a>'
					})
					table.ajax.reload();
				} else {
					swal_error("Gagal!", data.msg, true);
				}
			},
			error: function(q, w, e) {
				alert(e)
				console.log(q.responseText)
			}
		});
		table.ajax.reload();
		$('input').removeAttr('value');
		$('#id').removeAttr('value');
	}

	function do_berangkat(id) {

		console.log(id);
		$.ajax({
			type: "POST",
			url: "<?=base_url('Pengantaran/do_berangkat')?>",
			data: {id : id},
			dataType: "JSON",
			success: function(data){
				console.log(data);
				if(data){
					Swal.fire({
						icon: 'success',
						title: 'Berhasil',
						text: 'Pengantaran Berhasil Diupdate'
					})
				} else {
					swal_error("Gagal!", data.msg, true);
				}
			},
			error: function(q, w, e) {
				alert(e)
				console.log(q.responseText)
			}
		});
		table.ajax.reload();
		
	}

	function do_selesai(id) {

		console.log(id);
		$.ajax({
			type: "POST",
			url: "<?=base_url('Pengantaran/do_selesai')?>",
			data: {id : id},
			dataType: "JSON",
			success: function(data){
				console.log(data);
				if(data){
					Swal.fire({
						icon: 'success',
						title: 'Berhasil',
						text: 'Pengantaran Berhasil Diupdate'
					})
				} else {
					swal_error("Gagal!", data.msg, true);
				}
			},
			error: function(q, w, e) {
				alert(e)
				console.log(q.responseText)
			}
		});
		table.ajax.reload();
		
	}

	function do_delete(id) {

		console.log(id);
		$.ajax({
			type: "POST",
			url: "<?=base_url('Pengantaran/do_delete')?>",
			data: {id : id},
			dataType: "JSON",
			success: function(data){
				console.log(data);
				if(data){
					Swal.fire({
						icon: 'success',
						title: 'Berhasil',
						text: 'Pengantaran Berhasil Dihapus'
					})
				} else {
					swal_error("Gagal!", data.msg, true);
				}
			},
			error: function(q, w, e) {
				alert(e)
				console.log(q.responseText)
			}
		});
		table.ajax.reload();
		
	}

	function detail(argument) {
		$.ajax({
			type: "GET",
			url: "<?=base_url('pengantaran/getfoto')?>/"+argument,
			// data: {id : argument},
			dataType: "JSON",
			success: function(data){
				console.log(data);
				if(data){
					console.log(data)					
					$("#d_tgl_pengantaran").val(data.tgl_pengantaran);
					$("#d_nm_vendor").val(data.nm_vendor);
					$("#d_no_dm").val(data.no_dm);
					$("#d_total_stt").val(data.total_stt);
					$("#d_total_stt").val(data.total_stt);
					$("#d_total_koli").val(data.total_koli);
					$("#d_total_kg").val(data.total_kg);
					$("#d_total_kgv").val(data.total_kgv);
					$("#d_total_m3").val(data.total_m3);
					$("#d_keterangan").val(data.keterangan);
					var y = tester(data.foto);
					$('#fotonya').html(y);
					console.log(y);
					$("#ModalDetail").modal("show");
				} else {
					swal_error("Gagal!", data.msg, true);
				}
			},
			error: function(q, w, e) {
				alert(e)
				console.log(q.responseText)
			}
		});
	}

	function tester(data) {
		var val = '';
		for (var i = 0; i < data.length; i++) {
			var gambar = data[i];			
			val = val+`<div class="col-md-4" style="margin:10px"><img src="${gambar}" style="height:150px"/></div>`;
		}
		return val;
	}

	function edit(argument) {
		$.ajax({
			type: "POST",
			url: "<?=base_url('pengantaran/detail')?>",
			data: {id : argument},
			dataType: "JSON",
			success: function(data){
				console.log(data);
				if(data){
					console.log(data)					
					$("#tgl_pengantaran").val(data.tgl_pengantaran);
					$("#nm_vendor").val(data.nm_vendor);
					$("#no_dm").val(data.no_dm);
					$("#total_stt").val(data.total_stt);
					$("#total_stt").val(data.total_stt);
					$("#total_koli").val(data.total_koli);
					$("#total_kg").val(data.total_kg);
					$("#total_kgv").val(data.total_kgv);
					$("#total_m3").val(data.total_m3);
					$("#keterangan").val(data.keterangan);
					$("#id").val(data.id);

					$("#ModalFilterBerjalan").modal("show");
				} else {
					swal_error("Gagal!", data.msg, true);
				}
			},
			error: function(q, w, e) {
				alert(e)
				console.log(q.responseText)
			}
		});
	}

</script>
<?php $__env->stopSection(); ?>
<?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/pengantaran/js-pengantaran.blade.php ENDPATH**/ ?>