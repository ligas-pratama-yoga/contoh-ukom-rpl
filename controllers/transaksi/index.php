<?php

require __DIR__ . "/../../models/Transaksi.php";
require __DIR__ . "/../../models/Pelanggan.php";

use Models\Transaksi;
use Models\pelanggan;

$datas = Transaksi::all(
    [
    'transaksi.id as "ID"',
    'pelanggan.nama as "Nama"',
    'pelanggan.email as "Email"',
    'transaksi.tanggal_transaksi as "Tanggal Transaksi"'
    ]
);
$columns = array_keys($datas[0] ?? []);

$id_pelanggan = Transaksi::all(
    [
    'pelanggan.id as "id_pelanggan"'
    ]
);
$data_pelanggan = Pelanggan::all(["id", "nama"]);


require __DIR__ . "/../../views/transaksi.view.php";
