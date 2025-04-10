<?php
partials("head");
partials("banner");
partials("navigation");
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Produk</li>
        </ol>
        <?php partials(
            "table", [
            "datas" => $datas, 
            "columns" => $columns,
             "detailLink" => "$base_url/produk/",
            ]
        ) ?>

        <?php partials('modal-head', ["id" => "tambahData", "title" => "Tambah Data"]) ?>
    <form action="<?= $base_url. "/produk" ?>" method="post">
            <?php partials(
                "form", [
                "forms" => [
                    [
                        "column" => "nama",
                        "label" => "Nama Produk"
                    ],
                    [
                        "column" => "harga",
                        "label" => "Harga"
                    ],
                    [
                        "column" => "stok",
                        "label" => "Stok",
                        "type" => "number"
                    ],
                ]
                ]
            ) ?>
        </form>
        <?php require __DIR__ . "/partials/modal-foot.php" ?>

        <?php partials('modal-head', ["id" => "editData", "title" => "Edit Data"]) ?>
    <form action="<?= $base_url. "/produk/" ?>" method="post">
            <input type="hidden" name="_method" value="patch">
            <input type="hidden" name="id">
            <?php partials(
                "form", [
                "forms" => [
                    [
                        "column" => "nama",
                        "label" => "Nama Produk"
                    ],
                    [
                        "column" => "harga",
                        "label" => "Harga"
                    ],
                    [
                        "column" => "stok",
                        "label" => "Stok",
                        "type" => "number"
                    ],
                ]
                ]
            ) ?>
        </form>
        <?php require __DIR__ . "/partials/modal-foot.php" ?>


        <?php partials('modal-head', ["id" => "hapusData", "title" => "Hapus Data"]) ?>
<form action="<?= $base_url . "/produk/" ?>" method="post">
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

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if($_SESSION['err'] ?? false): ?>
    <script>
	Swal.fire({
		title: "Error",
		text: "Pastikan Anda mengisi semua input field!",
		icon: "error"
	});
    </script>
    <?php unset($_SESSION['err']) ?>
<?php endif; ?>
<?php
require __DIR__ . "/partials/footer.php";
require __DIR__ . "/partials/foot.php";
?>
