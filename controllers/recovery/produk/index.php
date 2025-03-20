<?php


cekAuth();
require __DIR__ . "/../../../models/Produk.php";

$datas = \Models\Produk::allDeleted(['id as "ID"', 'nama_produk as "Nama Produk"','harga as "Harga"', 'stok as "Stok"', 'deleted_at as "Dihapus pada"']);
$columns = array_keys($datas[0] ?? []);
$headOne = "Produk";

require __DIR__ . "/../../../views/recovery.view.php";
