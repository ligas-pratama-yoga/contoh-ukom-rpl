<?php

require __DIR__ . "/../../models/Produk.php";

\Models\Produk::create($_POST);

header("location: {$base_url}/produk");
