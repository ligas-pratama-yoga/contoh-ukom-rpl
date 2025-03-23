<?php
require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/banner.php";
require __DIR__ . "/partials/navigation.php";
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Transaksi</h1>
        <?php partials(
            "table", [
            "title" => "Data Penjualan",
            "datas" => $datas,
            "columns" => $columns,
            "id_pelanggan" => $id_pelanggan,
            "key_pair" => ["id_pelanggan", "id_pelanggan"],
            "detailBtn" => true,
            "detailLink" => "{$base_url}/transaksi/"
            ]
        )?>

        <?php partials('modal-head', ["id" => "tambahData", "title" => "Tambah Data"]) ?>
    <form action="<?php echo $base_url ?>/transaksi" method="post">
            <label class="form-label" for="id_pelanggan">Pelanggan</label>
            <select class="form-select" name="id_pelanggan" id="id_pelanggan">
                <?php foreach ($data_pelanggan as $data): ?>
                <option
                    value="<?php echo $data["id"] ?>">
                    <?php echo $data["nama"] ?>
                </option>
                <?php endforeach;?>
            </select>
            <div class="mt-2" style="display: flex; justify-content: end;align-items: center;">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
        <?php require __DIR__ . "/partials/modal-foot.php" ?>

        <?php partials('modal-head', ["id" => "editData", "title" => "Edit Data"]) ?>
    <form action="<?php echo $base_url ?>/transaksi/" method="post">

            <input type="hidden" name="_method" value="patch">
            <input type="hidden" name="id">
            <label class="form-label" for="id_pelanggan">User</label>
            <select class="form-select" name="id_pelanggan" id="id_pelanggan">

                <option selected></option>

                <?php foreach ($data_pelanggan as $data): ?>
                <option
                    value="<?php echo $data["id"] ?>">
                    <?php echo trim($data["nama"])?>
                </option>
                <?php endforeach;?>
            </select>
            <?php partials(
                "form", [
                "forms" => [
                    [
                        "column" => "tanggal_transaksi",
                        "label" => "Tanggal transaksi",
                        "type" => "date"
                    ],
                ]
                ]
            ) ?>
        </form>
        <?php require __DIR__ . "/partials/modal-foot.php" ?>

        <?php partials('modal-head', ["id" => "hapusData", "title" => "Hapus Data"]) ?>
    <form action="<?php echo $base_url ?>/transaksi/" method="post">
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

<?php
require __DIR__ . "/partials/footer.php";
require __DIR__ . "/partials/foot.php";
?>
