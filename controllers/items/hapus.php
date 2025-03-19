<?php

require __DIR__ . "/../../models/Items.php";
// Lakukan pengecekan apakah user ingin hapus permanen atau tidak
$datas = $_POST;
if (!array_key_exists("permanent", $datas)) {
    \Models\Items::update(["deleted_at" => date('Y-m-d')])
                    ->where('id', $datas['id']);
} else {
    \Models\Items::delete($datas['id']);
}

header('location: ' . $_SERVER['HTTP_REFERER']);
