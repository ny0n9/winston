<?= $this->extend('layout/bs5-jsminimal'); ?>

<?= $this->section('metaTags'); ?>
<!-- Isi metaTags tambahan disini -->
<meta name="robots" content="noindex">
<meta name="description" content="Diskripsi singkat dari halaman yang akan ditampilkan">
<meta name="keywords" content="diskripsi, singkat, dari, halaman, yang, akan, ditampilkan">
<?= $this->endSection(); ?><!-- Section metaTags -->

<?= $this->section('pageStyles'); ?>
<!-- Isi CSS tambahan disini -->
<link href="<?= base_url('public/css/chart-2.9.4.css'); ?>" rel="stylesheet">
<?= $this->endSection(); ?><!-- Section pageStyles -->

<?= $this->section('pageMenu'); ?>
<?= $this->include('layout/bs5-main-menu') ?>
<?= $this->endSection(); ?><!-- Section pageMenu -->

<?= $this->section('pageContent'); ?>
<!-- Isi halaman utama disini -->
<section class="container-fluid">
	<article class="row">
		<div class="col-12">
			<h1 class="text-center"><?= $title; ?></h1>
		</div>
	</article>
</section>
<section class="container-fluid">
	<div class="row">
		<!-- AREA CHART -->
		<div class="card col-12 col-md-6">
			<div class="card-header text-bg-primary">
				<h3 class="card-title text-center">Area Chart</h3>
			</div>
			<div class="card-body">
				<canvas id="areaChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
		<!-- DONUT CHART -->
		<div class="card col-12 col-md-6">
			<div class="card-header text-bg-danger">
				<h3 class="card-title text-center">Donut Chart</h3>
			</div>
			<div class="card-body">
				<canvas id="donutChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<div class="row">
		<!-- PIE CHART -->
		<div class="card col-12 col-md-6">
			<div class="card-header text-bg-secondary">
				<h3 class="card-title text-center">Pie Chart</h3>
			</div>
			<div class="card-body">
				<canvas id="pieChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
		<!-- LINE CHART -->
		<div class="card col-12 col-md-6">
			<div class="card-header text-bg-success">
				<h3 class="card-title text-center">Line Chart</h3>
			</div>
			<div class="card-body">
				<canvas id="lineChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<div class="row">
		<!-- BAR CHART -->
		<div class="card col-12 col-md-6">
			<div class="card-header text-bg-primary">
				<h3 class="card-title text-center">Bar Chart</h3>
			</div>
			<div class="card-body">
				<canvas id="barChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
		<!-- STACKED BAR CHART -->
		<div class="card col-12 col-md-6">
			<div class="card-header text-bg-success">
				<h3 class="card-title text-center">Stacked Bar Chart</h3>
			</div>
			<div class="card-body">
				<canvas id="stackedBarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.row -->
</section><!-- /.container-fluid-->
<?= $this->endSection(); ?><!-- Section main -->

<?= $this->section('pageScripts'); ?>
<!-- Isi javascript tambahan disini -->
<script src="<?= base_url('public/js/chart-2.9.4.bundle.min.js'); ?>"></script>

<script type="text/javascript" {csp-script-nonce}>
	$(function() {
		/* ChartJS
		 * -------
		 * Here we will create a few charts using ChartJS
		 */

		//--------------
		//- AREA CHART -
		//--------------

		// Get context with jQuery - using jQuery's .get() method.
		var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

		var areaChartData = {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
					label: 'Digital Goods',
					backgroundColor: 'rgba(60,141,188,0.9)',
					borderColor: 'rgba(60,141,188,0.8)',
					pointRadius: false,
					pointColor: '#3b8bba',
					pointStrokeColor: 'rgba(60,141,188,1)',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba(60,141,188,1)',
					data: [28, 48, 40, 19, 86, 27, 90]
				},
				{
					label: 'Electronics',
					backgroundColor: 'rgba(210, 214, 222, 1)',
					borderColor: 'rgba(210, 214, 222, 1)',
					pointRadius: false,
					pointColor: 'rgba(210, 214, 222, 1)',
					pointStrokeColor: '#c1c7d1',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba(220,220,220,1)',
					data: [65, 59, 80, 81, 56, 55, 40]
				},
			]
		}

		var areaChartOptions = {
			maintainAspectRatio: false,
			responsive: true,
			legend: {
				display: false
			},
			scales: {
				xAxes: [{
					gridLines: {
						display: false,
					}
				}],
				yAxes: [{
					gridLines: {
						display: false,
					}
				}]
			}
		}

		// This will get the first returned node in the jQuery collection.
		new Chart(areaChartCanvas, {
			type: 'line',
			data: areaChartData,
			options: areaChartOptions
		})

		//-------------
		//- LINE CHART -
		//--------------
		var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
		var lineChartOptions = $.extend(true, {}, areaChartOptions)
		var lineChartData = $.extend(true, {}, areaChartData)
		lineChartData.datasets[0].fill = false;
		lineChartData.datasets[1].fill = false;
		lineChartOptions.datasetFill = false

		var lineChart = new Chart(lineChartCanvas, {
			type: 'line',
			data: lineChartData,
			options: lineChartOptions
		})

		//-------------
		//- DONUT CHART -
		//-------------
		// Get context with jQuery - using jQuery's .get() method.
		var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
		var donutData = {
			labels: [
				'Chrome',
				'IE',
				'FireFox',
				'Safari',
				'Opera',
				'Navigator',
			],
			datasets: [{
				data: [700, 500, 400, 600, 300, 100],
				backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
			}]
		}
		var donutOptions = {
			maintainAspectRatio: false,
			responsive: true,
		}
		//Create pie or douhnut chart
		// You can switch between pie and douhnut using the method below.
		new Chart(donutChartCanvas, {
			type: 'doughnut',
			data: donutData,
			options: donutOptions
		})

		//-------------
		//- PIE CHART -
		//-------------
		// Get context with jQuery - using jQuery's .get() method.
		var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
		var pieData = donutData;
		var pieOptions = {
			maintainAspectRatio: false,
			responsive: true,
		}
		//Create pie or douhnut chart
		// You can switch between pie and douhnut using the method below.
		new Chart(pieChartCanvas, {
			type: 'pie',
			data: pieData,
			options: pieOptions
		})

		//-------------
		//- BAR CHART -
		//-------------
		var barChartCanvas = $('#barChart').get(0).getContext('2d')
		var barChartData = $.extend(true, {}, areaChartData)
		var temp0 = areaChartData.datasets[0]
		var temp1 = areaChartData.datasets[1]
		barChartData.datasets[0] = temp1
		barChartData.datasets[1] = temp0

		var barChartOptions = {
			responsive: true,
			maintainAspectRatio: false,
			datasetFill: false
		}

		new Chart(barChartCanvas, {
			type: 'bar',
			data: barChartData,
			options: barChartOptions
		})

		//---------------------
		//- STACKED BAR CHART -
		//---------------------
		var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
		var stackedBarChartData = $.extend(true, {}, barChartData)

		var stackedBarChartOptions = {
			responsive: true,
			maintainAspectRatio: false,
			scales: {
				xAxes: [{
					stacked: true,
				}],
				yAxes: [{
					stacked: true
				}]
			}
		}

		new Chart(stackedBarChartCanvas, {
			type: 'bar',
			data: stackedBarChartData,
			options: stackedBarChartOptions
		})
	})
</script>
<?= $this->endSection(); ?><!-- Section pageScripts -->