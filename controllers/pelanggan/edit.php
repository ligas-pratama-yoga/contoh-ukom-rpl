<?php

require __DIR__ . "/../../models/Pelanggan.php";

$datas = $_POST;
array_shift($datas);

$datas_upload = array_slice($datas, 1);

\Models\Pelanggan::update($datas_upload)
                ->where('id', $datas['id']);

header("location: {$base_url}/pelanggan");
