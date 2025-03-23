<?php

require __DIR__ . "/../../models/Pelanggan.php";

\Models\Pelanggan::create($_POST);

header("location: {$base_url}/pelanggan");
