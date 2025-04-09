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

$data_items = Items::allId(
    $id, [
    'items_transaksi.id as "ID"',
    'produk.nama as "Nama Produk"',
    'items_transaksi.subtotal as "Jumlah Produk"',
    'produk.harga as "Harga/satuan"',
    'items_transaksi.subtotal * produk.harga as "Jumlah harga"'
    ]
);
/*$data_items = [];*/
/*$tmp = [];*/
/*foreach ($data_items_tmp as $data) {*/
/*    $unit = array_map(*/
/*        function ($k, $v) {*/
/*            if ($k == "Harga/satuan" || $k == "Jumlah Harga") {*/
/*                $v = idr($v);*/
/*            }*/
/*            return $ret;*/
/*        },*/
/*        array_keys($data),*/
/*        array_values($data)*/
/*    );*/
/*}*/
/*echo "<pre>";*/
/*var_dump($data_items);*/
/*echo "</pre>";*/
/*exit;*/

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

$tambahBtn = $data_transaksi['status_pembayaran'] == null ? true : false;
// BERAKHIR DISINI!!!
if (isset($_SESSION['showAlert'])) {
    $showDangerAlert = $_SESSION['showAlert'] == 'danger' ? true : false;
    $showSuccessAlert = $_SESSION['showAlert'] == 'success' ? true : false;
}


require __DIR__ . "/../../views/transaksi_view.view.php";
