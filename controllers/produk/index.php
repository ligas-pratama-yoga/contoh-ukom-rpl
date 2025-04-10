<?php

cekAuth();
require __DIR__ . "/../../models/Produk.php";

$datas = \Models\Produk::all(['id as "ID"', 'nama as "Nama Produk"','harga as "Harga"', 'stok as "Stok"', 'merek as "Merek"']);
$columns = array_keys($datas[0] ?? []);

require __DIR__ . "/../../views/produk.view.php";
