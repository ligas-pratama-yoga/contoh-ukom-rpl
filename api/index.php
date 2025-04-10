<?php
session_start();
require __DIR__ . "/../helper/functions.php";
$base_url = str_replace("/index.php", "", $_SERVER['SCRIPT_NAME']);
var_dump($base_url);
exit;
$uri = str_replace($base_url, "", preg_replace("$\d+$", "{id}", $_SERVER['REQUEST_URI']));
$method = strtolower($_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD']);
$routes = [
    'get' => [
        "/" => base_path("controllers/static/index.php"),
        "/pdf" => base_path("views/pdfMaker.view.php"),

        "/produk" => __DIR__ . "/../controllers/produk/index.php",
        "/users" => __DIR__ . "/../controllers/users/index.php",
        "/pelanggan" => __DIR__ . "/../controllers/pelanggan/index.php",
        "/items_transaksi" => __DIR__ . "/../controllers/items/index.php",
        "/transaksi/{id}" => __DIR__ . "/../controllers/transaksi/view.php",
        "/transaksi" => __DIR__ . "/../controllers/transaksi/index.php",
        "/transaksi/recovery" => __DIR__ . "/../controllers/recovery/transaksi/index.php",
        "/transaksi/{id}/recovery" => __DIR__ . "/../controllers/recovery/transaksi/index_view.php",
        "/produk/recovery" => __DIR__ . "/../controllers/recovery/produk/index.php",
        "/users/recovery" => __DIR__ . "/../controllers/recovery/users/index.php",
        "/pelanggan/recovery" => __DIR__ . "/../controllers/recovery/pelanggan/index.php",

        "/login" => __DIR__ . "/../views/login.php",
    ],
    'post' => [
        "/login" => __DIR__ . "/../controllers/session/tambah.php",

        "/produk" => __DIR__ . "/../controllers/produk/tambah.php",
        "/pelanggan" => __DIR__ . "/../controllers/pelanggan/tambah.php",
        "/pelanggan/recovery/{id}" => __DIR__ . "/../controllers/recovery/pelanggan/restore.php",
        "/produk/recovery/{id}" => __DIR__ . "/../controllers/recovery/produk/restore.php",
        "/users/recovery/{id}" => __DIR__ . "/../controllers/recovery/users/restore.php",
        "/transaksi/recovery/{id}" => __DIR__ . "/../controllers/recovery/transaksi/restore.php",
        "/transaksi/{id}/recovery/{id}" => __DIR__ . "/../controllers/recovery/transaksi/restore_view.php",
        "/users" => __DIR__ . "/../controllers/users/tambah.php",
        "/items_transaksi" => __DIR__ . "/../controllers/items/tambah.php",
        "/transaksi" => __DIR__ . "/../controllers/transaksi/tambah.php",

        "/transaksi/bayar" => __DIR__ . "/../controllers/transaksi/bayar.php"
    ],
    "patch" => [
        "/produk/{id}" => __DIR__ . "/../controllers/produk/edit.php",
        "/users/{id}" => __DIR__ . "/../controllers/users/edit.php",
        "/pelanggan/{id}" => __DIR__ . "/../controllers/pelanggan/edit.php",
        "/items_transaksi/{id}" => __DIR__ . "/../controllers/items/edit.php",
        "/transaksi/{id}" => __DIR__ . "/../controllers/transaksi/edit.php",
    ],
    "delete" => [
        "/produk/{id}" => __DIR__ . "/../controllers/produk/hapus.php",
        "/users/{id}" => __DIR__ . "/../controllers/users/hapus.php",
        "/pelanggan/{id}" => __DIR__ . "/../controllers/pelanggan/hapus.php",
        "/items_transaksi/{id}" => __DIR__ . "/../controllers/items/hapus.php",
        "/transaksi/{id}" => __DIR__ . "/../controllers/transaksi/hapus.php",
        "/logout" => __DIR__ . "/../controllers/session/hapus.php"
    ]
];

/*exit;*/
if (array_key_exists($uri, $routes[$method])) {
    include $routes[$method][$uri];
} else {
    echo "<h1>404 Not Found</h1>";
    echo "<h1>Halaman tidak ditemukan!</h1>";
    echo "<a href='/'>Kembali ke habitat</a>";
}
