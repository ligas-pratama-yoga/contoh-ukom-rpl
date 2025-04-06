<?php

require __DIR__ . "/../../models/Transaksi.php";
use Models\Transaksi;

$datas = $_POST;

/*$datas['total_harga'] = ltrim($datas['total_harga'], "Rp");*/
/*$datas['inputUang'] = number_format($datas['inputUang'], 2, ',', '.');*/

if ($datas['total_harga'] == null || $datas['total_harga'] == 0) {
    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

if ($datas["total_harga"] > $datas['inputUang']) {
    $_SESSION['showAlert'] = 'danger';
} else {
    $_SESSION['showAlert'] = 'success';
    Transaksi::update(["status_pembayaran" => "sudah bayar"])
   ->where('id', $datas['id_transaksi']);
}

header('location: ' . $_SERVER['HTTP_REFERER']);
