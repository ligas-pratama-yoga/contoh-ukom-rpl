<?php

cekAuth();
require __DIR__ . "/../../models/Produk.php";

$datas = \Models\Produk::all(['id as "ID"', 'nama_produk as "Nama Produk"','harga as "Harga"', 'stok as "Stok"']);
$columns = array_keys($datas[0] ?? []);

require __DIR__ . "/../../views/produk.view.php";
