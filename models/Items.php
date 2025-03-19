<?php

namespace Models;

require_once __DIR__ . "/../core/Models.php";

class Items extends \Core\Models
{
    public $table = "items_transaksi";

    public static function all($columns = ["*"])
    {
        $instance = new static();
        $columns = implode(',', $columns);
        return $instance->conn->query("select {$columns} from {$instance->table} 
                                    inner join (select transaksi.id as \"id_transaksi\", users.* from transaksi 
                                                inner join users on transaksi.id_users = users.id) tmp_pelanggan
                                                on {$instance->table}.id_transaksi = tmp_pelanggan.id_transaksi
                                    inner join produk on {$instance->table}.id_produk = produk.id
                                        where items_transaksi.deleted_at is null order by items_transaksi.id")->fetchAll();
    }

    public static function allId($id, $columns = ["*"]) {
        $instance = new static();
        $columns = implode(',', $columns);
        return $instance->conn->query("select $columns from {$instance->table} 
                                    inner join (select transaksi.id as \"id_transaksi\", users.* from transaksi 
                                                inner join users on transaksi.id_users = users.id) tmp_pelanggan
                                                on {$instance->table}.id_transaksi = tmp_pelanggan.id_transaksi
                                    inner join produk on {$instance->table}.id_produk = produk.id
                                        where items_transaksi.deleted_at is null 
                                        and items_transaksi.id_transaksi = $id
                                        order by items_transaksi.id
                                        ")->fetchAll();
    }

    public static function totalPrice($id) {
        $instance = new static;
        return $instance->conn->query("
                                select sum($instance->table.jumlah_produk * produk.harga) as \"total_harga\" from $instance->table
                                    inner join produk on $instance->table.id_produk = produk.id
                                where $instance->table.id_transaksi = $id
                                and $instance->table.deleted_at is null
                                ")->fetch()["total_harga"];
    }
}
