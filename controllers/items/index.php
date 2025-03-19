<?php


require __DIR__ . "/../../models/Items.php";

use Models\Items;

$datas = Items::all([
    'items_transaksi.id as "ID"',
    'tmp_pelanggan.name as "Nama"',
    'tmp_pelanggan.email as "Email"',
    'produk.nama_produk as "Nama Produk"',
    'produk.harga as "Harga"',
    'items_transaksi.jumlah_produk as "Jumlah Produk"',
    'items_transaksi.jumlah_produk * produk.harga as "Total Harga"'
]);
$columns = array_keys($datas[0] ?? []);

// require __DIR__ . "/../../models/Items.php";

// $datas = \Models\Items::all();
// $columns = array_keys($datas[0] ?? []);
// $datas = \Models\Transaksi::all(["tmp_pelanggan.nama_pelanggan", "tmp_pelanggan.alamat", "transaksi.id", "transaksi.created_at"])


// require __DIR__ . "/../../models/Items.php";

// $datas = \Models\Items::all([  'items_transaksi.id as "ID"',
//                                         'tmp_pelanggan.name as "Pelanggan"',
//                                         'produk.nama_produk as "Produk"',
//                                         'produk.harga as "Harga"',
//                                         'items_transaksi.jumlah_produk as "Jumlah Produk"',
//                                         'items_transaksi.jumlah_produk * produk.harga as "Total Harga"'
//                                     ]);
// $columns = array_keys($datas[0] ?? []);

require __DIR__ . "/../../views/items.view.php";
