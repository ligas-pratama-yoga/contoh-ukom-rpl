<?php

require __DIR__ . "/../../models/Users.php";

$datas = $_POST;
array_shift($datas);

$datas_upload = array_slice($datas, 1);

foreach($datas_upload as $data){
    if($data == ""){
        $_SESSION['err'] = true;
        header("location: {$base_url}/produk");
    }
}

\Models\Users::update($datas_upload)
                ->where('id', $datas['id']);

header("location: {$base_url}/users");
