<?php

require __DIR__ . "/../../models/Produk.php";

\Models\Produk::create($_POST);

header('location: /kasir_ligas/public/produk');
