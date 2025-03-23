<?php

require __DIR__ . "/../../../models/Pelanggan.php";

use Models\Pelanggan;

$datas = Pelanggan::allDeleted([
    'id as "ID"',
    'nama as "Nama"',
    'alamat as "Alamat"',
    'nomor_telepon as "Nomor Telepon"',
    'deleted_at as "Dihapus pada"'
]);
$columns = array_keys($datas[0] ?? []);
$headOne = "Pelanggan";
require __DIR__ . "/../../../views/recovery.view.php";
