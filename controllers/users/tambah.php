<?php

require __DIR__ . "/../../models/Users.php";

\Models\Users::create($_POST);

header("location: $base_url/users");
