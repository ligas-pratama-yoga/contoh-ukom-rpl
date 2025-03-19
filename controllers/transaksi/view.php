<?php

require __DIR__ . "/../../models/Transaksi.php";
require __DIR__ . "/../../models/Items.php";
require __DIR__ . "/../../models/Produk.php";

use Models\Transaksi;
use Models\Items;
use Models\Produk;

$explode_uri = explode("/", $_SERVER['REQUEST_URI']);
$id = end($explode_uri);

$data_transaksi = Transaksi::find($id);

$data_items = Items::allId($id, [
    'items_transaksi.id as "ID"',
    'produk.nama_produk as "Nama Produk"',
    'produk.harga as "Harga/satuan"',
    'items_transaksi.jumlah_produk as "Jumlah Produk"',
    'items_transaksi.jumlah_produk * produk.harga as "Jumlah Harga"'
]);

$data_produk = Produk::all();
$columns = array_keys($data_items[0] ?? []);
$total_harga = Items::totalPrice($id);

$data_items_pdf = [$columns];
foreach ($data_items as $data) {
    $data_items_pdf[] = array_values($data);
}
$data_items_pdf[] = [
    [
        'colSpan' => 4,
        'text' => "Total Harga"
    ],
    [],
    [],
    [],
    [
        "text" => $total_harga
    ],
];


// BERAKHIR DISINI!!!
if (isset($_SESSION['showAlert'])) {
    $showDangerAlert = $_SESSION['showAlert'] == 'danger' ? true : false;
    $showSuccessAlert = $_SESSION['showAlert'] == 'success' ? true : false;
}


require __DIR__ . "/../../views/transaksi_view.view.php";
