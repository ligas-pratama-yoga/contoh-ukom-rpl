<?php

use Models\Items;
use Models\Produk;

require __DIR__ . "/../../models/Items.php";
require __DIR__ . "/../../models/Produk.php";

Items::create($_POST);
$stok = Produk::find($_POST['id_produk'])["stok"];
Produk::update(["stok" => $stok - $_POST['subtotal']])
    ->where('id', $_POST['id_produk']);

header("location: $base_url/transaksi/{$_POST['id_transaksi']}");
