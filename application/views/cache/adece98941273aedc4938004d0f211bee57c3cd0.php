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
		alert(e)
		console.log(q.responseText)
	}
});

var a_take = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookingall/take")); ?>';
var a_confirm = '<?php echo e(get_instance()->Rolemenumodel->checkuri("bookingall/confirm")); ?>';

$("#dr_tgl").val('<?php echo e(date("Y-m-"."01")); ?>');
$("#sp_tgl").val('<?php echo e(date("Y-m-"."31")); ?>');

$(document).ready(function() {
	getData();
});

$("#bt-filter").click(function(){
	getData();
});

function getData() {
	var asal 		= $('#id_asal').val();
	var tujuan 		= $('#id_tujuan').val();
	var layanan 	= $('#id_layanan').val();
	var dr_tgl 		= $('#dr_tgl').val();
	var sp_tgl 		= $('#sp_tgl').val();
	const data = {id_asal:asal, id_tujuan:tujuan, id_layanan:layanan, dr_tgl: dr_tgl, sp_tgl : sp_tgl};
	$("#show_all").dataTable().fnDestroy();
	$('#show_all').DataTable({
		"processing": true,
		"serverSide": true,
		"ordering": true,
		"order": [[ 0, 'asc' ]],
		"ajax":
		{
			"url": "<?php echo base_url() ?>bookingall/get_booking",
			"type": "POST",
			"data": data,
		},
		"deferRender": true,
		"aLengthMenu": [[50, 100, 500],[ 50, 100, 500]],
		"columns": [
			{ "render": function ( data, type, row )
				{
					return '<a href="#" onclick="popup('+row.id_bookingorder+')">'+row.kode_booking+'</a><br>'+row.created_at;
				}
			},
			{
				"render": function ( data, type, row )
				{ 
					return '<a href="https://wa.me/'+fix_wa(row.hp_pengirim)+'" target="_blank" style="color:black; text-align:center;cursor: pointer;">'+row.nama_pengirim+'<br><label class="bg-primary" style="padding: 5px; border-radius:10px; color:white;cursor: pointer;">'+row.hp_pengirim+'</label></a> ';
				}
			},
			{ 
				"render": function ( data, type, row )
				{ 
					return '<span>'+row.nama_kab_pengirim+'</span><br>'+'<span style="color:blue">'+row.nama_kec_pengirim+'</span>';
				}
			},
			{ 
				"render": function ( data, type, row )
				{ 
					return '<a href="https://wa.me/'+fix_wa(row.hp_penerima)+'" target="_blank" style="color:black; text-align:center">'+row.nm_penerima+'<br><label class="bg-primary" style="padding: 5px; border-radius:10px; color:white;cursor: pointer;">'+row.hp_penerima+'</label></a> ';
				}
			},
			{ 
				"render": function ( data, type, row )
				{ 
					return '<span>'+row.nama_kab_penerima+'</span><br>'+'<span style="color:blue">'+row.nama_kec_penerima+'</span>';
				}
			},
			{ 
				"render": function ( data, type, row )
				{ 
					return '<a href="#" onclick="cek('+row.id_bookingorder+')"><label class="bg-warning" style="padding: 5px; border-radius:10px; color:#FFFF"><i class="fas fa-arrow-down text-white" style="margin-right: 8px"></i>'+row.nama_status+'</label></a>';
				}
			},
			{ "render": function ( data, type, row ){ 
				var html = '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button><div class="dropdown-menu">';

				if (row.id_bookingstatus < 2 && a_confirm ==true) {
					html += '<a class="dropdown-item" href="<?php echo e(base_url()); ?>bookingall/confirm/'+row.id_bookingorder+'"><span><i class="fa fa-truck mr-1"></i></span> Ambil Booking</a><a class="dropdown-item" href="#"><span><i class="fa fa-trash mr-1"></i></span> Hapus</a>';
				}

				html += '<a class="dropdown-item" href="#" onclick="cek('+row.id_bookingorder+')"><span><i class="fa fa-eye mr-1"></i></span> Detail Status</a></div></div>';

				return html
				}
			}
		],
	});
}

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

function goFoto(id) {
	$("#modal-foto").modal("show");
	$.ajax({
		url : "<?php echo e(base_url()); ?>bookings/getfoto/"+id,
		method : "GET",
		success :function(data){
			$("#div-bukti").empty();
			$("#div-bukti").append(data);
		},
		error: function(q, w, e) {
			console.log(q.responseText)
		}
	});
}
</script>
<?php $__env->stopSection(); ?><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/js-booking-tanpa-marketing.blade.php ENDPATH**/ ?>