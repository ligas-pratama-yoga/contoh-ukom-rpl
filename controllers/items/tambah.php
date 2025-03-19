<?php

use Models\Items;
use Models\Produk;

require __DIR__ . "/../../models/Items.php";
require __DIR__ . "/../../models/Produk.php";

Items::create($_POST);
$stok = Produk::find($_POST['id_produk'])["stok"];
Produk::update(["stok" => $stok - $_POST['jumlah_produk']])
    ->where('id', $_POST['id_produk']);

header("location: /kasir_ligas/public/transaksi/{$_POST['id_transaksi']}");
