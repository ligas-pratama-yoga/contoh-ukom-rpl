<?php


require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/banner.php";
require __DIR__ . "/partials/navigation.php";

?>

<main>
	<div class="container-fluid px-4">
		<h1 class="mt-4">Dashboard</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active">Dashboard</li>
		</ol>
		<div class="row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<div class="card bg-primary text-light">
					<div class="card-body d-flex flex-column justify-content-center align-items-center">
						<span>Jumlah Pelanggan</span>
						<h1>100</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card bg-warning">
					<div class="card-body d-flex flex-column justify-content-center align-items-center">
						<span>Jumlah Transaksi</span>
						<h1>100</h1>
					</div>
				</div>
			</div>
		</div>
		<div style="width: 800px;"><canvas id="acquisitions"></canvas></div>
		<canvas id="myChart" style="width:100%;max-width:700px"></canvas>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
		<script>
			const data = {
				labels: [
					'Red',
					'Blue',
					'Yellow'
				],
				datasets: [{
					label: 'My First Dataset',
					data: [300, 50, 100],
					backgroundColor: [
						'rgb(255, 99, 132)',
						'rgb(54, 162, 235)',
						'rgb(255, 205, 86)'
					],
					hoverOffset: 4
				}]
			};
			var xyValues = [{
					x: 50,
					y: 7
				},
				{
					x: 60,
					y: 8
				},
				{
					x: 70,
					y: 8
				},
				{
					x: 80,
					y: 9
				},
				{
					x: 90,
					y: 9
				},
				{
					x: 100,
					y: 9
				},
				{
					x: 110,
					y: 10
				},
				{
					x: 120,
					y: 11
				},
				{
					x: 130,
					y: 14
				},
				{
					x: 140,
					y: 14
				},
				{
					x: 150,
					y: 15
				}
			];
			const config = {
				type: 'doughnut',
				data: data,
			};

			// new Chart("myChart", {
			// 	type: "scatter",
			// 	data: {
			// 		datasets: [{
			// 			pointRadius: 4,
			// 			pointBackgroundColor: "rgb(0,0,255)",
			// 			data: xyValues
			// 		}]
			// 	},
			// 	options: {
			// 		legend: {
			// 			display: false
			// 		},
			// 		scales: {
			// 			xAxes: [{
			// 				ticks: {
			// 					min: 40,
			// 					max: 160
			// 				}
			// 			}],
			// 			yAxes: [{
			// 				ticks: {
			// 					min: 6,
			// 					max: 16
			// 				}
			// 			}],
			// 		}
			// 	}
			// });
		</script>
	</div>
</main>
<?php
require __DIR__ . "/partials/footer.php";
require __DIR__ . "/partials/foot.php";
?>