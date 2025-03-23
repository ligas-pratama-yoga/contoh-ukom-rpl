<?php

require __DIR__ . "/../../models/Transaksi.php";

$datas = $_REQUEST;
array_shift($datas);

$datas_upload = array_slice($datas, 1);

\Models\Transaksi::update($datas_upload)
                ->where('id', $datas['id']);

header("location: {$base_url}/transaksi");
