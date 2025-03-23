<?php

require __DIR__ . "/../../models/Pelanggan.php";
$datas = $_POST;
if (!array_key_exists("permanent", $datas)) {
    \Models\Pelanggan::update(["deleted_at" => date('Y-m-d')])
                    ->where('id', $datas['id']);
} else {
    \Models\Pelanggan::delete($datas['id']);
}

header("location: {$base_url}/pelanggan");
