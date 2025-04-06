<?php

require __DIR__ . "/../../../models/Items.php";

$datas = $_REQUEST;

\Models\Items::update(['deleted_at' => '-infinity'])
                ->where('id', $datas['id']);

header("location: $base_url/transaksi/recovery");
