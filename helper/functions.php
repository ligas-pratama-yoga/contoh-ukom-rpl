<?php

function base_path($path)
{
    return __DIR__ . "/../$path";
}

function partials($path, $variables = [])
{
    extract($variables);
    $base_url = str_replace("/index.php", "", $_SERVER['SCRIPT_NAME']);
    require base_path("views/partials/$path.php");
}


function cekAuth()
{
    if (!isset($_SESSION['id'])) {
        $base_url = str_replace("/index.php", "", $_SERVER['SCRIPT_NAME']);
        header("location: {$base_url}/login");
        exit;
    }
}
