<?= $this->extend('layout/bs4_minimal') ;?>

<?= $this->section('metaTags') ;?>
<!-- Isi metaTags tambahan disini -->
<meta name="robots" content="noindex">
<meta name="description" content="Diskripsi singkat dari halaman yang akan ditampilkan">
<meta name="keywords" content="diskripsi, singkat, dari, halaman, yang, akan, ditampilkan">
<?= $this->endSection() ;?><!-- Section metaTags -->

<?= $this->section('pageStyles') ;?>
<!-- Isi CSS tambahan disini -->
<link href="<?= base_url('public/css/alt/adminlte-wins-comp.min.css'); ?>" rel="stylesheet">
<?= $this->endSection() ;?><!-- Section pageStyles -->

<?= $this->section('pageMenu') ;?>
<?= $this->include('layout/main_menu') ?>
<?= $this->endSection() ;?><!-- Section pageMenu -->

<?= $this->section('pageContent') ;?>
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
				<div class="col-md-6">
					<!-- AREA CHART -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Area Chart</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fa fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
					<!-- DONUT CHART -->
					<div class="card card-danger">
						<div class="card-header">
							<h3 class="card-title">Doughnut Chart</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fa fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<canvas id="doughnutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
					<!-- PIE CHART -->
					<div class="card card-danger">
						<div class="card-header">
							<h3 class="card-title">Pie Chart</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fa fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col (LEFT) -->
				<div class="col-md-6">
					<!-- LINE CHART -->
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">Line Chart</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fa fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
					<!-- BAR CHART -->
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">Bar Chart</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fa fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
					<!-- STACKED BAR CHART -->
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">Stacked Bar Chart</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fa fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col (RIGHT) -->
			</div>
			<!-- /.row -->
	</section><!-- /.container-fluid -->
<?= $this->endSection() ;?><!-- Section main -->

<?= $this->section('pageScripts') ;?>
<!-- Isi javascript tambahan disini -->
<script src="<?= base_url(); ?>/public/js/chart-wins.min.js"></script>
<script src="<?= base_url('public/js/adminlte.min.js'); ?>"></script>

<script>
// AREA CHART
const areaChartLabels  = [
	'January', 'February', 'March', 'April', 'May', 'June', 'July'
];
const areaChartData = {
	labels  : areaChartLabels,
	datasets: [
		{
			label : 'Digital Goods',
			backgroundColor : 'rgba(60,141,188,0.8)',
			borderColor : 'rgba(60,141,188,1)',
			data : [28, 48, 40, 19, 86, 27, 90],
			fill: true
		},
		{
			label : 'Electronics',
			backgroundColor : 'rgba(210, 214, 222, 1)',
			borderColor : 'rgba(239, 245, 66, 1)',
			data : [65, 59, 80, 81, 56, 55, 40],
			fill: true
		},
	]
}
const areaChartConfig = {
	type: 'line',
	data: areaChartData,
	plugins: [ChartDataLabels],
    options: {
		plugins: {
			filler: {
				propagate: false,
			},
			title: {
				display: true,
				text: 'Chart.js 3.9.1 Area Chart'
			},
			datalabels: {
				backgroundColor: '#000',
				color: '#FFF',
				padding: 3,
				borderRadius: 8,
				borderWidth: 2
			}
		},
		pointBackgroundColor: '#fff',
		radius: 10,
		interaction: {
			intersect: false
		}
	}
}
const areaChart = new Chart(
	document.getElementById('areaChart'),
	areaChartConfig
)

// LINE CHART
const lineChartLabels  = [
	'January', 'February', 'March', 'April', 'May', 'June', 'July'
];
const lineChartData = {
	labels  : lineChartLabels,
	datasets: [
		{
			label : 'Digital Goods',
			backgroundColor : 'rgba(60,141,188,0.9)',
			borderColor : 'rgba(60,141,188,0.8)',
			data : [28, 48, 40, 19, 86, 27, 90]
		},
		{
			label : 'Electronics',
			backgroundColor : 'rgba(210, 214, 222, 1)',
			borderColor : 'rgba(210, 214, 222, 1)',
			data : [65, 59, 80, 81, 56, 55, 40]
		},
	]
}
const lineChartConfig = {
	type: 'line',
	data: lineChartData,
	plugins: [ChartDataLabels],
    options: {
		plugins: {
			title: {
				display: true,
				text: 'Chart.js 3.9.1 Line Chart'
			},
			datalabels: {
				backgroundColor: '#000',
				color: '#FFF',
				padding: 3,
				borderRadius: 8,
				borderWidth: 2
			}
		}
	}
}
const lineChart = new Chart(
	document.getElementById('lineChart'),
	lineChartConfig
)

// BAR CHART
const barChartLabels  = [
	'January', 'February', 'March', 'April', 'May', 'June', 'July'
];
const barChartData = {
	labels  : barChartLabels,
	datasets: [
		{
			label : 'Digital Goods',
			backgroundColor : 'rgba(60,141,188,0.9)',
			borderColor : 'rgba(60,141,188,0.8)',
			data : [28, 48, 40, 19, 86, 27, 90]
		},
		{
			label : 'Electronics',
			backgroundColor : 'rgba(210, 214, 222, 1)',
			borderColor : 'rgba(210, 214, 222, 1)',
			data : [65, 59, 80, 81, 56, 55, 40]
		},
	]
}
const barChartConfig = {
	type: 'bar',
	data: barChartData,
	plugins: [ChartDataLabels],
    options: {
		responsive: true,
		plugins: {
			legend: {
				position: 'top',
			},
			title: {
				display: true,
				text: 'Chart.js 3.9.1 Bar Chart'
			},
			datalabels: {
				backgroundColor: '#000',
				color: '#FFF',
				padding: 3,
				borderRadius: 8,
				borderWidth: 2
			}
		}
	}
}
const barChart = new Chart(
	document.getElementById('barChart'),
	barChartConfig
)

// DOUGHNUT CHART
const doughnutChartLabels = [
	'Chrome', 'IE', 'FireFox', 'Safari', 'Opera', 'Navigator'
];
const doughnutChartData = {
	labels : doughnutChartLabels,
	datasets: [{
		data: [700,500,400,600,300,100],
		backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
	}]
}
const doughnutChartConfig = {
	type: 'doughnut',
	data: doughnutChartData,
	plugins: [ChartDataLabels],
    options: {
		responsive: true,
		plugins: {
			legend: {
				position: 'top',
			},
			title: {
				display: true,
				text: 'Chart.js 3.9.1 Doughnut Chart'
			},
			datalabels: {
				backgroundColor: '#000',
				color: '#FFF',
				padding: 3,
				borderRadius: 8,
				borderWidth: 2
			}
		}
	}
}
const doughnutChart = new Chart(
	document.getElementById('doughnutChart'),
	doughnutChartConfig
)

// PIE CHART
const pieChartLabels = [
	'Chrome', 'IE', 'FireFox', 'Safari', 'Opera', 'Navigator'
];
const pieChartData = {
	labels : pieChartLabels,
	datasets: [{
		data: [700,500,400,600,300,100],
		backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
	}]
}
const pieChartConfig = {
	type: 'pie',
	data: pieChartData,
	plugins: [ChartDataLabels],
    options: {
		responsive: true,
		plugins: {
			legend: {
				position: 'top',
			},
			title: {
				display: true,
				text: 'Chart.js 3.9.1 Pie Chart'
			},
			datalabels: {
				backgroundColor: '#000',
				color: '#FFF',
				padding: 3,
				borderRadius: 8,
				borderWidth: 2
			}
		}
	}
}
const pieChart = new Chart(
	document.getElementById('pieChart'),
	pieChartConfig
)

// STACKED BAR CHART
const stackedBarChartLabels = [
	'January', 'February', 'March', 'April', 'May', 'June', 'July'
];
const stackedBarChartData = {
	labels  : stackedBarChartLabels,
	datasets: [
		{
			label : 'Digital Goods',
			backgroundColor : 'rgba(60,141,188,0.9)',
			borderColor : 'rgba(60,141,188,0.8)',
			data : [28, 48, 40, 19, 86, 27, 90]
		},
		{
			label : 'Electronics',
			backgroundColor : 'rgba(210, 214, 222, 1)',
			borderColor : 'rgba(210, 214, 222, 1)',
			data : [65, 59, 80, 81, 56, 55, 40]
		},
	]
}
const stackedBarChartConfig = {
	type: 'bar',
	data: stackedBarChartData,
	plugins: [ChartDataLabels],
    options: {
		responsive: true,
		plugins: {
			legend: {
				position: 'top',
			},
			title: {
				display: true,
				text: 'Chart.js 3.9.1 Stacked Bar Chart'
			},
			datalabels: {
				backgroundColor: '#000',
				color: '#FFF',
				padding: 3,
				borderRadius: 8,
				borderWidth: 2
			}
		},
		scales: {
			x: {
				stacked: true,
			},
			y: {
				stacked: true
			}
		}
	}
}
const stackedBarChart = new Chart(
	document.getElementById('stackedBarChart'),
	stackedBarChartConfig
)
</script>

<?= $this->endSection() ;?><!-- Section pageScripts -->