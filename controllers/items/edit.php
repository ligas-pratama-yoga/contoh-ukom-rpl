<?php

require __DIR__ . "/../../models/Items.php";

$datas = $_REQUEST;
array_shift($datas);

$datas_upload = array_slice($datas, 1);

\Models\Items::update($datas_upload)
                ->where('id', $datas['id']);

header('location: '. $_SERVER['HTTP_REFERER']);
