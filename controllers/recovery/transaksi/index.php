<?php

require __DIR__ . "/../../../models/Transaksi.php";
require __DIR__ . "/../../../models/Pelanggan.php";

use Models\Transaksi;
use Models\Pelanggan;

$datas = Transaksi::allDeleted([
    'transaksi.id as "ID"',
    'pelanggan.nama as "Nama"',
    'transaksi.tanggal_transaksi as "Tanggal Transaksi"',
    'transaksi.deleted_at as "Dihapus pada"'
]);
$columns = array_keys($datas[0] ?? []);

$id_pelanggan = Transaksi::all([
    'pelanggan.id as "id_pelanggan"'
]);
$data_pelanggan = Pelanggan::all(["id", "nama"]);
$headOne = "Transaksi";

require __DIR__ . "/../../../views/recovery.view.php";
