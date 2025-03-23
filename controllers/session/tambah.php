<?php

require __DIR__ . "/../../models/Users.php";
use Models\Users;

if (Users::find($_POST)) {
    $_SESSION['id'] = $_POST['nama'];
    header("location: {$base_url}/");
} else {
    header("location: {$base_url}/login");
}
