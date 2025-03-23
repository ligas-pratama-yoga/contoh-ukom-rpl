<?php

require __DIR__ . "/../../models/Pelanggan.php";

use Models\Pelanggan;

$datas = Pelanggan::all([
    'id as "ID"',
    'nama as "Nama"',
    'alamat as "Alamat"',
    'nomor_telepon as "Nomor Telepon"'
]);
$columns = array_keys($datas[0] ?? []);

require __DIR__ . "/../../views/pelanggan.view.php";
