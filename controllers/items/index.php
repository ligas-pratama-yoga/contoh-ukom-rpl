<?php


require __DIR__ . "/../../models/Items.php";

use Models\Items;

$datas = Items::all([
    'items_transaksi.id as "ID"',
    'tmp_pelanggan.nama as "Nama"',
    'tmp_pelanggan.email as "Email"',
    'produk.nama as "Nama Produk"',
    'produk.harga as "Harga"',
    'items_transaksi.jumlah_produk as "Jumlah Produk"',
    'items_transaksi.jumlah_produk * produk.harga as "Total Harga"'
]);
$columns = array_keys($datas[0] ?? []);

require __DIR__ . "/../../views/items.view.php";
