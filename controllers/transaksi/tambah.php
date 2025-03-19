<?php

require __DIR__ . "/../../models/Transaksi.php";

\Models\Transaksi::create($_POST);

header('location: /kasir_ligas/public/transaksi');
