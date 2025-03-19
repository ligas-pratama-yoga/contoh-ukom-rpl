<?php


require __DIR__ . "/../../models/Users.php";
use Models\Users;

// var_dump(Users::find($_POST));
// exit;
if (Users::find($_POST)) {
    $_SESSION['id'] = $_POST['name'];
    header("location: /kasir_ligas/public/");
} else {
    header("location: /kasir_ligas/public/login");
}
