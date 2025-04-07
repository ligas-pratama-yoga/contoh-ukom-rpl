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
                        <h1><?php echo $jumlah_pelanggan ?></h1>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="card bg-warning">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <span>Jumlah Transaksi</span>
                        <h1><?php echo $jumlah_transaksi ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 border d-flex justify-content-center align-items-center w-100" >
          <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@3.1.0/dist/chartjs-plugin-annotation.min.js"></script>
        <script>
          function index(perc) {
            return perc < 70 ? 0 : perc < 90 ? 1 : 2;
          }
          const ctx = document.getElementById("myChart");
          const annotation = {
            type: 'doughnutLabel',
            content: ({chart}) => [
              chart.data.datasets[0].data[0].toFixed(2) + ' %',
              'CPU utilization',
            ],
            drawTime: 'beforeDraw',
            position: {
              y: '-50%'
            },
            font: [{size: 50, weight: 'bold'}, {size: 20}],
            color: ({chart}) => [COLORS[index(chart.data.datasets[0].data[0])], 'grey']
          };
          const COLORS = ['rgb(140, 214, 16)', 'rgb(239, 198, 0)', 'rgb(231, 24, 49)'];
          const MIN = 0;
          const MAX = 100;

          const value = 20
          const data = {
            datasets: [{
              data: [value, 100 - value],
              backgroundColor(ctx) {
                if (ctx.type !== 'data') {
                  return;
                }
                if (ctx.index === 1) {
                  return 'rgb(234, 234, 234)';
                }
                return COLORS[index(ctx.raw)];
              }
            }]
          };
          const config = {
            type: 'doughnut',
            data,
            options: {
              aspectRatio: 2,
              circumference: 180,
              rotation: -90,
              plugins: {
                annotation: {
                  annotations: {
                    annotation
                  }
                }
              }
            }
          };

          new Chart(ctx, config);
        </script>
    </div>
</main>
<?php
require __DIR__ . "/partials/footer.php";
require __DIR__ . "/partials/foot.php";
?>
