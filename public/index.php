<?php

session_start();
require __DIR__ . "/../helper/functions.php";

$uri = preg_replace("$\d+$", "{id}", $_SERVER['REQUEST_URI']);
$method = strtolower($_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD']);
$routes = [
    'get' => [
        "/kasir_ligas/public/transaksi/{id}" => __DIR__ . "/../controllers/transaksi/view.php",
        "/kasir_ligas/public/transaksi" => __DIR__ . "/../controllers/transaksi/index.php",
        "/kasir_ligas/public/produk/recovery" => __DIR__ . "/../controllers/recovery/produk/index.php",

        "/kasir_ligas/public/" => base_path("controllers/static/index.php"),
        "/kasir_ligas/public/pdf" => base_path("views/pdfMaker.view.php"),

        "/kasir_ligas/public/produk" => __DIR__ . "/../controllers/produk/index.php",
        "/kasir_ligas/public/users" => __DIR__ . "/../controllers/users/index.php",
        "/kasir_ligas/public/items_transaksi" => __DIR__ . "/../controllers/items/index.php",

        "/kasir_ligas/public/login" => __DIR__ . "/../views/login.php",
    ],
    'post' => [
        "/kasir_ligas/public/login" => __DIR__ . "/../controllers/session/tambah.php",

        "/kasir_ligas/public/produk" => __DIR__ . "/../controllers/produk/tambah.php",
        "/kasir_ligas/public/produk/recovery/{id}" => __DIR__ . "/../controllers/recovery/produk/restore.php",
        "/kasir_ligas/public/users" => __DIR__ . "/../controllers/users/tambah.php",
        "/kasir_ligas/public/items_transaksi" => __DIR__ . "/../controllers/items/tambah.php",
        "/kasir_ligas/public/transaksi" => __DIR__ . "/../controllers/transaksi/tambah.php",

        "/kasir_ligas/public/transaksi/bayar" => __DIR__ . "/../controllers/transaksi/bayar.php"
    ],
    "patch" => [
        "/kasir_ligas/public/produk/{id}" => __DIR__ . "/../controllers/produk/edit.php",
        "/kasir_ligas/public/users/{id}" => __DIR__ . "/../controllers/users/edit.php",
        "/kasir_ligas/public/items_transaksi/{id}" => __DIR__ . "/../controllers/items/edit.php",
        "/kasir_ligas/public/transaksi/{id}" => __DIR__ . "/../controllers/transaksi/edit.php",
    ],
    "delete" => [
        "/kasir_ligas/public/produk/{id}" => __DIR__ . "/../controllers/produk/hapus.php",
        "/kasir_ligas/public/users/{id}" => __DIR__ . "/../controllers/users/hapus.php",
        "/kasir_ligas/public/items_transaksi/{id}" => __DIR__ . "/../controllers/items/hapus.php",
        "/kasir_ligas/public/transaksi/{id}" => __DIR__ . "/../controllers/transaksi/hapus.php",
        "/kasir_ligas/public/logout" => __DIR__ . "/../controllers/session/hapus.php"
    ]
];


if (array_key_exists($uri, $routes[$method])) {
    require $routes[$method][$uri];
} else {
    echo "<h1>404 Not Found</h1>";
    echo "<h1>Halaman tidak ditemukan!</h1>";
    echo "<a href='/kasir_ligas/public/'>Kembali ke habitat</a>";
}
