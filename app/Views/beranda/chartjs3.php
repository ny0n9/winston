<?= $this->extend('layout/bs5-jsminimal'); ?>

<?= $this->section('metaTags'); ?>
<!-- Isi metaTags tambahan disini -->
<meta name="robots" content="noindex">
<meta name="description" content="Diskripsi singkat dari halaman yang akan ditampilkan">
<meta name="keywords" content="diskripsi, singkat, dari, halaman, yang, akan, ditampilkan">
<?= $this->endSection(); ?><!-- Section metaTags -->

<?= $this->section('pageStyles'); ?>
<!-- Isi CSS tambahan disini -->
<link href="<?= base_url('public/css/alt/adminlte-wins-comp.min.css'); ?>" rel="stylesheet">
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
		<div class="col-md-6">
			<!-- AREA CHART -->
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Area Chart</h3>
				</div>
				<div class="card-body">
					<div class="chart">
						<canvas id="areaChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
					</div>
				</div><!-- /.card-body -->
			</div><!-- /.card -->
			<!-- DONUT CHART -->
			<div class="card card-danger">
				<div class="card-header">
					<h3 class="card-title">Doughnut Chart</h3>
				</div>
				<div class="card-body">
					<canvas id="doughnutChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
				</div><!-- /.card-body -->
			</div><!-- /.card -->
			<!-- PIE CHART -->
			<div class="card card-danger">
				<div class="card-header">
					<h3 class="card-title">Pie Chart</h3>
				</div>
				<div class="card-body">
					<canvas id="pieChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
				</div><!-- /.card-body -->
			</div><!-- /.card -->
		</div><!-- /.col (LEFT) -->
		<div class="col-md-6">
			<!-- LINE CHART -->
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title">Line Chart</h3>
				</div>
				<div class="card-body">
					<div class="chart">
						<canvas id="lineChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
					</div>
				</div><!-- /.card-body -->
			</div><!-- /.card -->
			<!-- BAR CHART -->
			<div class="card card-success">
				<div class="card-header">
					<h3 class="card-title">Bar Chart</h3>
				</div>
				<div class="card-body">
					<div class="chart">
						<canvas id="barChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
					</div>
				</div><!-- /.card-body -->
			</div><!-- /.card -->
			<!-- STACKED BAR CHART -->
			<div class="card card-success">
				<div class="card-header">
					<h3 class="card-title">Stacked Bar Chart</h3>
				</div>
				<div class="card-body">
					<div class="chart">
						<canvas id="stackedBarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
					</div>
				</div><!-- /.card-body -->
			</div><!-- /.card -->
		</div><!-- /.col (RIGHT) -->
	</div><!-- /.row -->
</section><!-- /.container-fluid -->

<hr class="pembatas">
<section class="container-fluid">
	<article class="row" id="chart-js3">
		<div class="card col-12 col-md-6">
			<div class="card-body">
				<h3 class="card-title bg-primary text-white">Line Chart</h3>
				<canvas id="dLineChart" style="width: 98%;"></canvas>
			</div>
		</div>
		<div class="card col-12 col-md-6">
			<div class="card-body">
				<h3 class="card-title bg-success text-white">Neu Pie Chart</h3>
				<canvas id="neuPieChart" style="width: 98%;"></canvas>
			</div>
		</div>
	</article>
</section>

<?= $this->endSection(); ?><!-- Section main -->

<?= $this->section('pageScripts'); ?>
<!-- Isi javascript tambahan disini -->
<script src="<?= base_url(); ?>/public/js/chart-wins.min.js"></script>
<script src="<?= base_url('public/js/adminlte.min.js'); ?>"></script>

<script>
	// AREA CHART
	const areaChartLabels = [
		'January', 'February', 'March', 'April', 'May', 'June', 'July'
	];
	const areaChartData = {
		labels: areaChartLabels,
		datasets: [{
				label: 'Digital Goods',
				backgroundColor: 'rgba(60,141,188,0.8)',
				borderColor: 'rgba(60,141,188,1)',
				data: [28, 48, 40, 19, 86, 27, 90],
				fill: true
			},
			{
				label: 'Electronics',
				backgroundColor: 'rgba(210, 214, 222, 1)',
				borderColor: 'rgba(239, 245, 66, 1)',
				data: [65, 59, 80, 81, 56, 55, 40],
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
	const lineChartLabels = [
		'January', 'February', 'March', 'April', 'May', 'June', 'July'
	];
	const lineChartData = {
		labels: lineChartLabels,
		datasets: [{
				label: 'Digital Goods',
				backgroundColor: 'rgba(60,141,188,0.9)',
				borderColor: 'rgba(60,141,188,0.8)',
				data: [28, 48, 40, 19, 86, 27, 90]
			},
			{
				label: 'Electronics',
				backgroundColor: 'rgba(210, 214, 222, 1)',
				borderColor: 'rgba(210, 214, 222, 1)',
				data: [65, 59, 80, 81, 56, 55, 40]
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
	const barChartLabels = [
		'January', 'February', 'March', 'April', 'May', 'June', 'July'
	];
	const barChartData = {
		labels: barChartLabels,
		datasets: [{
				label: 'Digital Goods',
				backgroundColor: 'rgba(60,141,188,0.9)',
				borderColor: 'rgba(60,141,188,0.8)',
				data: [28, 48, 40, 19, 86, 27, 90]
			},
			{
				label: 'Electronics',
				backgroundColor: 'rgba(210, 214, 222, 1)',
				borderColor: 'rgba(210, 214, 222, 1)',
				data: [65, 59, 80, 81, 56, 55, 40]
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
		labels: doughnutChartLabels,
		datasets: [{
			data: [700, 500, 400, 600, 300, 100],
			backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
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
		labels: pieChartLabels,
		datasets: [{
			data: [700, 500, 400, 600, 300, 100],
			backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
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
		labels: stackedBarChartLabels,
		datasets: [{
				label: 'Digital Goods',
				backgroundColor: 'rgba(60,141,188,0.9)',
				borderColor: 'rgba(60,141,188,0.8)',
				data: [28, 48, 40, 19, 86, 27, 90]
			},
			{
				label: 'Electronics',
				backgroundColor: 'rgba(210, 214, 222, 1)',
				borderColor: 'rgba(210, 214, 222, 1)',
				data: [65, 59, 80, 81, 56, 55, 40]
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

<script type="text/javascript" {csp-script-nonce}>
	const lineLabels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'];
	const lineData = {
		labels: lineLabels,
		datasets: [{
				label: 'Dataset 1',
				data: [10, 30, 50, 20, 25, 44, -10],
				borderColor: 'rgba(255, 99, 132, 1)',
				backgroundColor: 'rgba(255, 99, 132, 0.5)',
			},
			{
				label: 'Dataset 2',
				data: [100, 33, 22, 19, 11, 49, 30],
				borderColor: 'rgba(54, 162, 235, 1)',
				backgroundColor: 'rgb(54, 162, 235, 0.5)',
			}
		]
	};
	const lineConfig = {
		type: 'line',
		data: lineData,
		plugins: [ChartDataLabels],
		options: {
			responsive: true,
			plugins: {
				title: {
					display: true,
					text: 'Min and Max Settings'
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
				y: {
					min: 10,
					max: 50,
				}
			}
		},
	};
	const dLineChart = new Chart(
		document.getElementById('dLineChart'),
		lineConfig
	);
</script>

<script type="text/javascript" {csp-script-nonce}>
	var neuData = {
		labels: ['Overall Yay', 'Overall Nay', 'Group A Yay', 'Group A Nay', 'Group B Yay', 'Group B Nay', 'Group C Yay', 'Group C Nay'],
		datasets: [{
				backgroundColor: ['#AAA', '#777'],
				data: [21, 79]
			},
			{
				backgroundColor: ['hsl(0, 100%, 60%)', 'hsl(0, 100%, 35%)'],
				data: [33, 67]
			},
			{
				backgroundColor: ['hsl(100, 100%, 60%)', 'hsl(100, 100%, 35%)'],
				data: [20, 80]
			},
			{
				backgroundColor: ['hsl(180, 100%, 60%)', 'hsl(180, 100%, 35%)'],
				data: [10, 90]
			}
		]
	};

	var ctx = document.getElementById("neuPieChart").getContext("2d");
	var neuPie = new Chart(ctx, {
		type: 'pie',
		data: neuData,
		plugins: [ChartDataLabels],
		options: {
			plugins: {
				legend: {
					labels: {
						generateLabels: function(chart) {
							// Get the default label list
							const original = Chart.overrides.pie.plugins.legend.labels.generateLabels;
							const labelsOriginal = original.call(this, chart);
							// Build an array of colors used in the datasets of the chart
							let datasetColors = chart.data.datasets.map(function(e) {
								return e.backgroundColor;
							});
							datasetColors = datasetColors.flat();
							// Modify the color and hide state of each label
							labelsOriginal.forEach(label => {
								// There are twice as many labels as there are datasets. This converts the label index into the corresponding dataset index
								label.datasetIndex = (label.index - label.index % 2) / 2;
								// The hidden state must match the dataset's hidden state
								label.hidden = !chart.isDatasetVisible(label.datasetIndex);
								// Change the color to match the dataset
								label.fillStyle = datasetColors[label.index];
							});
							return labelsOriginal;
						}
					},
					onClick: function(mouseEvent, legendItem, legend) {
						// toggle the visibility of the dataset from what it currently is
						legend.chart.getDatasetMeta(
							legendItem.datasetIndex
						).hidden = legend.chart.isDatasetVisible(legendItem.datasetIndex);
						legend.chart.update();
					}
				},
				tooltip: {
					callbacks: {
						label: function(context) {
							const labelIndex = (context.datasetIndex * 2) + context.dataIndex;
							return context.chart.data.labels[labelIndex] + ': ' + context.formattedValue;
						}
					}
				},
				title: {
					display: true,
					text: 'Chart.js 3.9.1 Multi Pie Chart'
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
	});
</script>

<?= $this->endSection(); ?><!-- Section pageScripts -->