<?php

require __DIR__ . "/../../models/Produk.php";

$datas = $_REQUEST;
array_shift($datas);

$datas_upload = array_slice($datas, 1);

\Models\Produk::update($datas_upload)
                ->where('id', $datas['id']);

header('location: /kasir_ligas/public/produk');
