<?php

require __DIR__ . "/../../../models/Produk.php";

$datas = $_POST;

\Models\Produk::update(['deleted_at' => '-infinity'])
                ->where('id', $datas['id']);

header("location: {$base_url}/produk/recovery");
