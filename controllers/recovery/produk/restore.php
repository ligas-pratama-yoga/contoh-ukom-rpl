<?php

require __DIR__ . "/../../../models/Produk.php";

$datas = $_REQUEST;

\Models\Produk::update(['deleted_at' => '-infinity'])
                ->where('id', $datas['id']);

header('location: /kasir_ligas/public/produk/recovery');
