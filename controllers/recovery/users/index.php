<?php

require __DIR__ . "/../../../models/Users.php";

use Models\Users;

$datas = Users::allDeleted([
    'id as "ID"',
    'nama as "Nama"',
    'email as "Email"',
    'deleted_at as "Dihapus pada"'
]);
$columns = array_keys($datas[0] ?? []);
$headOne = "Users";
require __DIR__ . "/../../../views/recovery.view.php";
