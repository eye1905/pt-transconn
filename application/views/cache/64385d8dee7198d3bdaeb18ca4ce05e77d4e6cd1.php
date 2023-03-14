<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">

	var emotions = ["0"];
	var colouarray = ['rgb(255, 99, 132)','rgb(54, 162, 235)','rgb(255, 205, 86)','rgba(75, 192, 192, 0.2)','rgba(255, 99, 132, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 205, 86, 0.2)','rgba(75, 192, 192, 0.2)'];
	var borderColor = ['rgb(255, 99, 132)','rgb(255, 159, 64)','rgb(255, 205, 86)','rgb(75, 192, 192)','rgb(255, 99, 132)','rgb(255, 159, 64)','rgb(255, 205, 86)','rgb(75, 192, 192)',];
	var initialData = [0.1, 0.1, 0.1, 0.1];
	var updatedDataSet;

	/*Creating the bar chart*/
	var ctx = document.getElementById("myChart1");
	var ctx2 = document.getElementById("myChart2");

	var barChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: emotions,
			datasets: [{
				backgroundColor: colouarray,
				borderColor : borderColor,
				borderWidth: 1,
				label: 'Grafik By Marketing',
				data: initialData
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						min: 0,
						max: 1,
						stepSize: 0.5,
					}
				}]
			}
		}
	});

	var label = [];
	for (var i = 1; i <= 31; i++) {
		label.push(i);
	}
	var Mar1 = document.getElementById("Mar1");

	var ChartMarketing1 = new Chart(Mar1, {
		type: 'line',
		data: {
			labels: label,
			datasets: [{
				backgroundColor: colouarray,
				borderColor : borderColor,
				borderWidth: 1,
				label: 'Grafik Penjemputan Per Hari',
				data: initialData
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						min: 0,
						max: 1,
						stepSize: 0.5,
					}
				}]
			}
		}
	});

	var Sopir = document.getElementById("Sopir");
	var ChartSopir = new Chart(Sopir, {
		type: 'bar',
		data: {
			labels: emotions,
			datasets: [{
				backgroundColor: colouarray,
				borderColor : borderColor,
				borderWidth: 1,
				label: 'Grafik Penjemputan Sopir',
				data: initialData
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						min: 0,
						max: 1,
						stepSize: 0.5,
					}
				}]
			}
		}
	});


	var dogChart = new Chart(ctx2, {
		type: 'doughnut',
		data: {
			labels: emotions,
			datasets: [{
				backgroundColor: colouarray,
				borderColor : borderColor,
				borderWidth: 1,
				label: 'Grafik By Marketing',
				data: initialData
			}]
		},
		options: {
			cutout : [50,50,50,50],
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						min: 0,
						max: 1,
						stepSize: 0.5,
					}
				}]
			}
		}
	});

	/*Function to update the bar chart*/
	function updateBarGraph(chart, label, color, data,borderColor,marketing) {
		chart.data.datasets.pop();
		// for (var i = 0; i < marketing.length; i++) {
		// 	chart.data.labels.pop();
		// }	
		// for (var i = 0; i < marketing.length; i++) {
		// 	chart.data.labels.push(marketing[i]);
		// }	

		chart.data.labels = marketing;	

		chart.data.datasets.push({
			label: label,
			backgroundColor: color,
			borderWidth: 1,
			borderColor : borderColor,
			data: data,
		});
		chart.update();
	}

	function updateLineGraph(chart, label, color, data,borderColor) {
		chart.data.datasets.pop();	
		chart.data.datasets.push({
			label: label,
			backgroundColor: color,
			borderWidth: 1,
			borderColor : borderColor,
			data: data,
		});
		chart.update();
	}

	$(document).ready(function() {
		filter();
		bar();
		bar_sopir();
		charLine();
		// filter_bar();
	});

	function filter() {
		var marketing = $("#id_marketing").val();
		var dr_tgl = $("#dr_tgl").val();
		var sp_tgl = $("#sp_tgl").val();
		var jml = null;
		$.ajax({
			type: "POST",
			url : "<?=base_url('Dashboards/get_data')?>",
			data: {id_marketing : marketing, dr_tgl : dr_tgl, sp_tgl : sp_tgl},
			dataType: "JSON",
			success: function(response){
				var datanya = response;
				// console.log(datanya);	

				document.getElementById('jml_booking').value = datanya.data;		
				document.getElementById('jml_pickup_internal').value = datanya.internal;	
				document.getElementById('jml_pickup_vendor').value = datanya.vendor;
				document.getElementById('jml_stt_created').value = datanya.stt_cr;
			}
		});
	}

	$("#bt-filter").click(function(){
		filter();
		bar();
		bar_sopir();
		charLine();
	});

	$("#bt-reset").click(function(){
		$("#id_asal").select2().select2('val','0');
		$('#id_tujuan').select2().select2('val','0');
		$('#id_status').select2().select2('val','0');
		$('#dr_tgl').val(null);
		$('#sp_tgl').val(null);
		$('#id_marketing').select2().select2('val','0');
		$('#id_sopir').select2().select2('val','0');

		filter();
		bar();
		bar_sopir();
		charLine();
	});

	function bar() {
		var marketing = $("#id_marketing").val();
		var dr_tgl = $("#dr_tgl").val();
		var sp_tgl = $("#sp_tgl").val();
		var jml = null;

		$.ajax({
			type: "POST",
			url : "<?=base_url('Dashboards/by_marketing')?>",
			data: {id_marketing : marketing, dr_tgl : dr_tgl, sp_tgl : sp_tgl},
			dataType: "JSON",
			success: function(response){
				var datanya = response;
				// console.log(datanya);

				updatedDataSet = datanya.data;
				updateBarGraph(barChart,'Grafik By Marketing', colouarray, updatedDataSet, borderColor, datanya.marketing);
				updateBarGraph(dogChart,'Grafik By Marketing', colouarray, updatedDataSet, borderColor, datanya.marketing);
				
			}
		});	
	}

	function bar_sopir() {
		var marketing = $("#id_marketing").val();
		var dr_tgl = $("#dr_tgl").val();
		var sp_tgl = $("#sp_tgl").val();
		var jml = null;

		$.ajax({
			type: "POST",
			url : "<?=base_url('Dashboards/by_sopir')?>",
			data: {id_marketing : marketing, dr_tgl : dr_tgl, sp_tgl : sp_tgl},
			dataType: "JSON",
			success: function(response){
				var datanya = response;
				// console.log(datanya);

				updatedDataSet = datanya.data;
				updateBarGraph(ChartSopir,'Grafik Penjemputan By Sopir', colouarray, updatedDataSet, borderColor, datanya.sopir);
				
			}
		});	
	}

	function charLine() {
		var marketing = $("#id_marketing").val();
		var dr_tgl = $("#dr_tgl").val();
		var sp_tgl = $("#sp_tgl").val();
		var jml = null;

		$.ajax({
			type: "POST",
			url : "<?=base_url('Dashboards/by_hari')?>",
			data: {id_marketing : marketing, dr_tgl : dr_tgl, sp_tgl : sp_tgl},
			dataType: "JSON",
			success: function(response){
				var datanya = response;
				console.log(datanya);

				updatedDataSet = datanya.data;
				updateLineGraph(ChartMarketing1,'Grafik Penjemputan Per Hari', colouarray, updatedDataSet, borderColor, datanya.marketing);
			}
		});	
	}



</script><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/js-dashboard.blade.php ENDPATH**/ ?>