<?php


require __DIR__ . "/../../models/Users.php";

use Models\Users;

$datas = Users::all([
    'id as "ID"',
    'nama as "Nama"',
    'email as "Email"'
]);
$columns = array_keys($datas[0] ?? []);

require __DIR__ . "/../../views/users.view.php";
