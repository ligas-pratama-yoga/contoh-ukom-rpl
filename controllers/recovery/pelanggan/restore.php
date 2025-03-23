<?php

require __DIR__ . "/../../../models/Pelanggan.php";

$datas = $_REQUEST;

\Models\Pelanggan::update(['deleted_at' => '-infinity'])
                ->where('id', $datas['id']);

header("location: {$base_url}/pelanggan/recovery");
