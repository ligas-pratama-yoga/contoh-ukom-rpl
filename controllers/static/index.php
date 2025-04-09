<?php

cekAuth();

require base_path("models/Pelanggan.php");
require base_path("models/Transaksi.php");
require base_path("models/Items.php");
require base_path("models/Produk.php");

use Models\Pelanggan;
use Models\Transaksi;
use Models\Items;
use Models\Produk;

$jumlah_transaksi = Transaksi::count();
$jumlah_pelanggan = Pelanggan::count();
$jumlah_stok_tersisa = Produk::jumlah_sisa_stok();
$jumlah_stok_terbeli = Items::total_stok_terbeli() ?? 0;
$jumlah_stok = $jumlah_stok_terbeli + $jumlah_stok_tersisa;

require __DIR__ . "/../../views/index.view.php";
