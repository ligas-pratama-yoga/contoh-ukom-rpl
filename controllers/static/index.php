<?php

cekAuth();

require base_path("models/Pelanggan.php");
require base_path("models/Transaksi.php");

use Models\Pelanggan;
use Models\Transaksi;


$jumlah_transaksi = Transaksi::count();
$jumlah_pelanggan = Pelanggan::count();

require __DIR__ . "/../../views/index.view.php";
