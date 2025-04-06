<?php

require __DIR__ . "/../../models/Users.php";
// Lakukan pengecekan apakah user ingin hapus permanen atau tidak
$datas = $_POST;
if (!array_key_exists("permanent", $datas)) {
    \Models\Users::update(["deleted_at" => date('Y-m-d')])
                    ->where('id', $datas['id']);
} else {
    \Models\Users::delete($datas['id']);
}

header("location: $base_url/users");
