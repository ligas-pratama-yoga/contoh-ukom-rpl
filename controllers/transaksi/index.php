<?php

require __DIR__ . "/../../models/Transaksi.php";
require __DIR__ . "/../../models/Pelanggan.php";

use Models\Transaksi;
use Models\Pelanggan;

$datas = Transaksi::all(
    [
    'transaksi.id as "ID"',
    'pelanggan.nama as "Nama"',
    'transaksi.tanggal_transaksi as "Tanggal Transaksi"',
    'transaksi.status_pembayaran as "Status Pembayaran"'
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
