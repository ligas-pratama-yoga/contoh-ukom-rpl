<?php

namespace Models;

use Core\Models;

require_once __DIR__ . "/../core/Models.php";

class Pelanggan extends Models
{
    public $table = "pelanggan";

    public static function find($columns = [])
    {
        $instance = new static();
        if (!is_array($columns)) {
            $columns = [$columns];
        }
        $columns_tmp = implode(", ", array_keys($columns));
        $where = "";


        foreach ($columns as $column => $value) {
            $where .= "$column = '$value' AND ";
        }

        $where = rtrim($where, "AND ");
        return $instance->conn->query("select $columns_tmp from $instance->table where $where")->fetch() ?? false;
    }
}
