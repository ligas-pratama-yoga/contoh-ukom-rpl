<?php

require __DIR__ . "/../../../models/Transaksi.php";
require __DIR__ . "/../../../models/Users.php";

use Models\Transaksi;
use Models\Users;

$datas = Transaksi::allDeleted([
    'transaksi.id as "ID"',
    'users.name as "Nama"',
    'users.email as "Email"',
    'transaksi.created_at as "Tanggal Transaksi"',
    'deleted_at as "Dihapus pada"'
]);
$columns = array_keys($datas[0] ?? []);

$id_users = Transaksi::all([
    'users.id as "id_user"'
]);
$data_users = Users::all(["id", "name"]);


require __DIR__ . "/../../../views/transaksi.view.php";
