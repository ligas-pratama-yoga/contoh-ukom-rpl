<?php

require __DIR__ . "/../../models/Users.php";

\Models\Users::create($_POST);

header('location: /kasir_ligas/public/users');
