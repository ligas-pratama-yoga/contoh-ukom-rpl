<?php


require __DIR__ . "/../../../models/Users.php";

use Models\Users;

$datas = Users::allDeleted([
    'id as "ID"',
    'name as "Nama"',
    'email as "Email"',
    'deleted_at as "Dihapus pada"'
]);
$columns = array_keys($datas[0] ?? []);

require __DIR__ . "/../../../views/users.view.php";
