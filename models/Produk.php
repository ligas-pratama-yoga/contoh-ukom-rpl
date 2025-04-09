<?php

namespace Models;

require_once __DIR__ . "/../core/Models.php";

class Produk extends \Core\Models
{
    public $table = "produk";

    public static function jumlah_sisa_stok()
    {
        $instance = new static;

        return $instance->conn->query(
            "select sum(stok) as \"jumlah sisa stok\" from $instance->table"
        )->fetch()['jumlah sisa stok'];
    }
}
