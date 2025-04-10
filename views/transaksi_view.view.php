<?php
require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/banner.php";
require __DIR__ . "/partials/navigation.php";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.72/pdfmake.min.js" crossorigin="anonymous"
	referrerpolicy="no-referrer"></script>
<!--vfs_fonts.js is essential for embedding fonts into PDF documents created with pdfmake-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.72/vfs_fonts.js" crossorigin="anonymous"
	referrerpolicy="no-referrer"></script>

<script>
	function generatePDF() {
		const docDefinition = {
			content: [{
					text: "Laporan transaksi",
					style: 'header'
				},
				{
					text: "<?php echo date('j F, Y') ?>",
					style: 'transactionDate'
				},
				{
					canvas: [{
						type: 'line',
						x1: 0,
						y1: 5,
						x2: 515,
						y2: 5,
						lineWidth: 2.5,
						lineColor: 'black',
					}, ],
					margin: [0, 10, 0, 20],
				},
				{
					table: {
						headerRows: 1,
						widths: ['*', '*', '*', '*', '*'],
						body: <?php echo json_encode($data_items_pdf) ?>
					}
				}
			],
			styles: {
				header: {
					fontSize: 22,
					bold: true,
					decoration: 'underline'
				},
				transactionDate: {
					fontSize: 12,
					italics: true,
				}
			}
		};

		pdfMake
			.createPdf(docDefinition)
			.download(
				'Invoice-<?= date("j F, Y, H:m:s") ?>.pdf');
	}
</script>

<main>
	<div class="container-fluid px-4">
		<div class="row align-items-start">
			<!-- MULAI DARI SINI!!! -->
			<div class="col flex">
				<h1 class="mt-4">Kasir</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a
								href="<?php echo $base_url ?>/">Dashboard</a>
						</li>
						<li class="breadcrumb-item"><a
								href="<?php echo $base_url ?>/transaksi">Transaksi</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							<?php echo $id ?>
						</li>
					</ol>
				</nav>
			</div>
			<div class="col mb-4 mt-4">
				<div class="card w-100">
					<div class="card-body flex flex-column">
						<span style="display: block;">Total harga</span>
						<span class="display-5"
							style="font-weight: 600;"><?php echo $total_harga ?></span>
					</div>
				</div>
			</div>
			<div class="w-100"></div>
			<!-- BERAKHIR DISINI!!! -->
			<div class="col">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between flex-row">
							<h2>
								Transaksi
							</h2>
							<div>

								<button id="download-button" onclick="generatePDF()" class="btn btn-info">Print</button>
								<!--                         MULAI DARI SINI         -->
								<?php if($tambahBtn ?? true) : ?>
								<button type="button" class="btn btn-lg btn-outline-info" data-bs-toggle="modal"
									data-bs-target="#transaksiModal">
									<i class="fas fa-money-bill"></i>
									Bayar
								</button>
								<?php endif; ?>
								<!-- SELESAI DISINI -->
							</div>
						</div>
						<div class="container">
							<div class="row">
								<div class="col border">
									ID Transaksi
								</div>
								<div class="col border">
									<?php echo $id ?>
								</div>
								<div class="w-100"></div>
								<div class="col border">
									Tanggal Transaksi
								</div>
								<div class="col border">
									<?php echo $data_transaksi["tanggal_transaksi"] ?>
								</div>
								<!--  DARI SINI -->
								<div class="w-100"></div>
								<div class="col border">
									Status
								</div>
								<div class="col border">
									<?php echo $data_transaksi["status_pembayaran"] == null ? "<span class='badge text-danger'>Belum bayar</span>" : "<span class='badge text-success'>Sudah bayar</span>" ?>
								</div>
								<!-- SAMPAI SINI -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col mb-4">
				<div class="card">
					<div class="card-body">
						<h2>Data Pelanggan</h2>
						<div class="container">
							<div class="row align-items-start">
								<div class="col border">
									ID
								</div>
								<div class="col border">
									<?php echo $data_transaksi["id_pelanggan"] ?>
								</div>
								<div class="w-100"></div>
								<div class="col border">
									Nama
								</div>
								<div class="col border">
									<?php echo $data_transaksi["nama"] ?>
								</div>
								<div class="w-100"></div>
								<div class="col border">
									Alamat
								</div>
								<div class="col border">
									<?php echo $data_transaksi["alamat"] ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php partials(
		    "table",
		    [
		                                    "datas" => $data_items,
		                                    "columns" => $columns,
		                                    "data_produk" => $data_produk,
		                                    "key_pair" => ["data_produk", "id"],
		                                    "totalPrice" => [true, $total_harga],
		                                    'tambahBtn' => $tambahBtn,
		                                    'btnRecovery' => false,
		                                    ]
		) ?>
	</div>
</main>

<?php partials('modal-head', ["id" => "transaksiModal", "title" => "Transaksi"]) ?>
<form action="<?php echo $base_url ?>/transaksi/bayar" method="post">
	<input type="hidden" name="id_transaksi"
		value="<?php echo $id ?>">
	<input type="hidden" name="total_harga"
		value="<?php echo $total_harga ?>">
	<div class="mb-3">
		<label for="total_harga" class="form-label">Total Harga</label>
		<input type="text" class="form-control" id="total_harga"
			value="<?php echo $total_harga ?>" disabled>
	</div>
	<div class="mb-3">
		<label for="inputUang" class="form-label">Nominal Uang</label>
		<input type="text" name="inputUang" id="inputUang" class="form-control" placeholder="Masukkan nominal uang">
	</div>
	<button class="btn btn-primary" type="submit">Simpan</button>
</form>
<?php partials("modal-foot") ?>

<?php partials('modal-head', ["id" => "tambahData", "title" => "Tambah Data"]) ?>
<form action="<?php echo $base_url ?>/items_transaksi" method="post">
	<input type="hidden" name="id_transaksi"
		value="<?php echo $id ?>">
	<div class="mb-3">
		<label class="form-label" for="id_produk">Produk</label>
		<select class="form-select" name="id_produk" id="id_produk">
			<option disabled selected>Pilih Produk</option>
			<?php foreach ($data_produk as $data): ?>
			<option
				value="<?php echo $data["id"] ?>">
				<?php echo $data["nama"] . " - " . $data["harga"] ?>
			</option>
			<?php endforeach;?>
		</select>
	</div>
	<div class="mb-3">
		<label for="subtotal" class="form-label">Jumlah Produk</label>
		<input class="form-control" type="number" name="subtotal" id="subtotal" placeholder="Masukkan Jumlah Produk"
			min="1">
	</div>
	<button class="btn btn-primary" type="submit">Simpan</button>
</form>
<?php partials("modal-foot") ?>

<!-- EDIT SALIN AJA DARI TAMBAH TINGGAL GANTI DIKIT!!! -->

<?php partials('modal-head', ["id" => "editData", "title" => "Edit Data"]) ?>
<form action="<?php echo $base_url ?>/items_transaksi/"
	method="post">
	<input type="hidden" name="_method" value="patch">
	<input type="hidden" name="id">
	<div class="mb-3">
		<label class="form-label" for="id_produk">Produk</label>
		<select class="form-select" name="id_produk" id="id_produk">
			<option disabled selected>Pilih Produk</option>
			<?php foreach ($data_produk as $data): ?>
			<option
				value="<?php echo $data["id"] ?>">
				<?php echo $data["nama"] ?>
			</option>
			<?php endforeach;?>
		</select>
	</div>
	<div class="mb-3">
		<label for="subtotal" class="form-label">Jumlah Produk</label>
		<input class="form-control" type="number" name="subtotal" id="subtotal" placeholder="Masukkan Jumlah Produk">
	</div>
	<button class="btn btn-primary" type="submit">Simpan</button>
</form>
<?php partials("modal-foot") ?>

<!-- SALIN AJA DARI MODAL HAPUS DARI produk.view.php!!! Ganti form action-nya -->

<?php partials('modal-head', ["id" => "hapusData", "title" => "Hapus Data"]) ?>
<form action="<?php echo $base_url ?>/items_transaksi/"
	method="post">
	<input type="hidden" name="_method" value="delete">
	<input type="hidden" name="id" value="">
	<div class="mb-3 form-check">
		<input type="checkbox" name="permanent" class="form-check-input" id="permanent">
		<label class="form-check-label" for="permanent">Hapus permanen</label>
	</div>
	<div style="display: flex; justify-content: end;align-items: center;">
		<button class="btn btn-primary" type="submit">Submit</button>
	</div>
</form>
<?php require __DIR__ . "/partials/modal-foot.php" ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if($showSuccessAlert ?? false) : ?>
<?php if($kembalian ?? false): ?>
<script>
	Swal.fire({
		title: "Transaksi Sukses",
		text: "Kembalian <?= $kembalian ?>",
		icon: "success"
	});
</script>

<?php else: ?>
<script>
	Swal.fire({
		title: "Transaksi Sukses",
		text: "Terimakasih",
		icon: "success"
	});
</script>
<?php endif; ?>
<?php endif; ?>

<?php if($showDangerAlert ?? false) : ?>
<script>
	Swal.fire({
		title: "Transaksi Gagal",
		text: "Maaf",
		icon: "warning"
	});
</script>
<?php endif; ?>
<?php
require __DIR__ . "/partials/footer.php";
require __DIR__ . "/partials/foot.php";
?>