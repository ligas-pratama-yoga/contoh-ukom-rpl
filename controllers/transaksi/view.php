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
    $id,
    [
    'items_transaksi.id as "ID"',
    'produk.nama as "Nama Produk"',
    'items_transaksi.subtotal as "Jumlah Produk"',
    'produk.harga as "Harga/satuan"',
    'items_transaksi.subtotal * produk.harga as "Jumlah harga"'
    ]
);

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

    unset($_SESSION['showAlert']);
}

if ($showSuccessAlert ?? false) {
    $kembalian = $_SESSION['kembalian'];
    unset($_SESSION['kembalian']);
}

// $tes_columns[]= array_values(array_slice($columns,1));
// $tes_columns = array_map(function($v){
//     return array_map(function($k){
//         $arr = [];
//         $tmp = $k;
//         $arr['text'] =  $tmp;
//         $arr['fontSize'] = 21;
//         $arr['bold'] = true;
//         return $arr;
//     }, array_values($v));
// }, $tes_columns);

$tes_columns = [
    [
        "Nama"
    ],
    [
        "Qty"
    ],
    [
        "Sat."
    ],
    [
        'Tota.'
    ]
    ];

$data_items_test = $data_items;
$data_items_test = array_map(function ($v) {
    return array_map(function ($k) {
        $arr = [];
        $tmp = $k;
        $arr['text'] =  $tmp;
        $arr['fontSize'] = 18;
        $arr['bold'] = true;
        return $arr;
    }, array_values(array_slice($v, 1)));
}, $data_items_test);
$user = $_SESSION['id'];
// echo "<pre>";
// var_dump($tes_columns);
// var_dump($data_items_test);
// echo "</pre>";
// exit;

require __DIR__ . "/../../views/transaksi_view.view.php";
