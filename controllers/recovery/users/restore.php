<?php

require __DIR__ . "/../../../models/Users.php";

$datas = $_REQUEST;

\Models\Users::update(['deleted_at' => '-infinity'])
                ->where('id', $datas['id']);

header('location: /kasir_ligas/public/users/recovery');
