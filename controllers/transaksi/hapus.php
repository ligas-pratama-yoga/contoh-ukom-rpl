<?php

require __DIR__ . "/../../models/Transaksi.php";
require __DIR__ . "/../../models/Items.php";
// Lakukan pengecekan apakah user ingin hapus permanen atau tidak
$datas = $_POST;
if (!array_key_exists("permanent", $datas)) {
    \Models\Transaksi::update(["deleted_at" => date('Y-m-d')])
                    ->where('id', $datas['id']);
} else {
    \Models\Items::deleteItemsWithTransactionId($datas['id']);
    \Models\Transaksi::delete($datas['id']);
}

header("location: {$base_url}/transaksi");
