<?php

namespace Models;

require_once __DIR__ . "/../core/Models.php";

class Produk extends \Core\Models
{
    public $table = "produk";

    public static function allNotSold($columns = ["*"])
    {
        $instance = new static();
        $columns = implode(',', $columns);
        return $instance->conn->query(
            "
                                select {$columns} from {$instance->table} 
                                where (deleted_at is null or 
                                deleted_at = '-infinity' )
                                and stok != 0
                                order by id
                                "
        )->fetchAll();
    }

    public static function jumlah_sisa_stok()
    {
        $instance = new static();

        return $instance->conn->query(
            "select sum(stok) as \"jumlah sisa stok\" from $instance->table
            where ($instance->table.deleted_at is null
                                or $instance->table.deleted_at = '-infinity')
            "
        )->fetch()['jumlah sisa stok'];
    }
}
