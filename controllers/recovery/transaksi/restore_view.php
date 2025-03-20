<?php

require __DIR__ . "/../../../models/Items.php";

$datas = $_REQUEST;

\Models\Items::update(['deleted_at' => '-infinity'])
                ->where('id', $datas['id']);

header('location: /kasir_ligas/public/transaksi/recovery');
