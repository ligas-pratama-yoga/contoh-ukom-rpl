<?php

require __DIR__ . "/../../../models/Items.php";

use Models\Items;

$explode_uri = explode("/", $_SERVER['REQUEST_URI']);
$id = $explode_uri[count($explode_uri) - 2];

$datas = Items::allIdDeleted($id, [
    'items_transaksi.id as "ID"',
    'produk.nama as "Nama Produk"',
    'produk.harga as "Harga/satuan"',
    'items_transaksi.subtotal as "Jumlah Produk"',
    'items_transaksi.subtotal * produk.harga as "Jumlah Harga"',
    'items_transaksi.deleted_at as "Dihapus pada"'
]);

$columns = array_keys($datas[0] ?? []);
$headOne = "Data Items Terhapus";

require __DIR__ . "/../../../views/recovery.view.php";
