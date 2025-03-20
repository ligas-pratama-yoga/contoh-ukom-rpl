<?php

require __DIR__ . "/../../../models/Transaksi.php";

$datas = $_REQUEST;

\Models\Transaksi::update(['deleted_at' => '-infinity'])
                ->where('id', $datas['id']);

header('location: /kasir_ligas/public/transaksi/recovery');
