<?php

require __DIR__ . "/../../models/Produk.php";

$datas = $_POST;
array_shift($datas);

$datas_upload = array_slice($datas, 1);

\Models\Produk::update($datas_upload)
                ->where('id', $datas['id']);

header("location: {$base_url}/produk");
