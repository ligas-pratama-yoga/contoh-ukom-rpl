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
        return $instance->conn->query(
            "select {$columns} from {$instance->table} 
                                    inner join (select transaksi.id as \"id_transaksi\", pelanggan.* from transaksi 
                                                inner join pelanggan on transaksi.id_pelanggan = pelanggan.id) tmp_pelanggan
                                                on {$instance->table}.id_transaksi = tmp_pelanggan.id_transaksi
                                    inner join produk on {$instance->table}.id_produk = produk.id
                                        where items_transaksi.deleted_at is null order by items_transaksi.id"
        )->fetchAll();
    }

    public static function allId($id, $columns = ["*"])
    {
        $instance = new static();
        $columns = implode(',', $columns);
        return $instance->conn->query(
            "select $columns from {$instance->table} 
                                    inner join (select transaksi.id as \"id_transaksi\", pelanggan.* from transaksi 
                                                inner join pelanggan on transaksi.id_pelanggan = pelanggan.id) tmp_pelanggan
                                                on {$instance->table}.id_transaksi = tmp_pelanggan.id_transaksi
                                    inner join produk on {$instance->table}.id_produk = produk.id
                                        where (items_transaksi.deleted_at is null 
                                        or items_transaksi.deleted_at = '-infinity')
                                        and items_transaksi.id_transaksi = $id
                                        order by items_transaksi.id
                                        "
        )->fetchAll();
    }
    public static function allIdDeleted($id, $columns = ["*"])
    {
        $instance = new static();
        $columns = implode(',', $columns);
        return $instance->conn->query(
            "select $columns from {$instance->table} 
                                    inner join (select transaksi.id as \"id_transaksi\", pelanggan.* from transaksi 
                                                inner join pelanggan on transaksi.id_pelanggan = pelanggan.id) tmp_pelanggan
                                                on {$instance->table}.id_transaksi = tmp_pelanggan.id_transaksi
                                    inner join produk on {$instance->table}.id_produk = produk.id
                                        where items_transaksi.deleted_at is not null 
                                        and items_transaksi.deleted_at != '-infinity'
                                        and items_transaksi.id_transaksi = $id
                                        order by items_transaksi.id
                                        "
        )->fetchAll();
    }

    public static function totalPrice($id)
    {
        $instance = new static();
        return $instance->conn->query(
            "
                                select sum($instance->table.subtotal * produk.harga) as \"total_harga\" from $instance->table
                                    inner join produk on $instance->table.id_produk = produk.id
                                where $instance->table.id_transaksi = $id
                                and ($instance->table.deleted_at is null
                                or $instance->table.deleted_at = '-infinity')
                                "
        )->fetch()["total_harga"];
    }

    public static function total_stok_terbeli()
    {
        $instance = new static;

        return $instance->conn->query(
            "select sum(subtotal) as \"total_stok_terbeli\" from $instance->table"
        )->fetch()["total_stok_terbeli"];
    }
}
