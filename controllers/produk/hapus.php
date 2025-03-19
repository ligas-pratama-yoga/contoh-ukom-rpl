<?php

require __DIR__ . "/../../models/Produk.php";
// Lakukan pengecekan apakah user ingin hapus permanen atau tidak
$datas = $_POST;
if (!array_key_exists("permanent", $datas)) {
    \Models\Produk::update(["deleted_at" => date('Y-m-d')])
                    ->where('id', $datas['id']);
} else {
    \Models\Produk::delete($datas['id']);
}

header('location: /kasir_ligas/public/produk');
