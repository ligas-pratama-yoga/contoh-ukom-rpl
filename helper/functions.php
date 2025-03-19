<?php

function base_path($path)
{
    return __DIR__ . "/../$path";
}

function partials($path, $variables = [])
{
    extract($variables);
    require base_path("views/partials/$path.php");
}


function cekAuth()
{
    if (!isset($_SESSION['id'])) {
        header("location: /kasir_ligas/public/login");
        exit;
    }
}
