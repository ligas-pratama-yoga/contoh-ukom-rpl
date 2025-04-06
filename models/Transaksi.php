<?php

namespace Models;

use Core\Models;

require_once __DIR__ . "/../core/Models.php";

class Transaksi extends Models
{
    public $table = "transaksi";

    public static function all($columns = ["*"])
    {
        $instance = new static();
        $columns = implode(',', $columns);
        return $instance->conn->query("select {$columns} from {$instance->table} inner join pelanggan on transaksi.id_pelanggan = pelanggan.id
                                        where transaksi.deleted_at is null order by transaksi.id")->fetchAll();
    }
    public static function allDeleted($columns = ["*"])
    {
        $instance = new static();
        $columns = implode(',', $columns);
        return $instance->conn->query("select {$columns} from {$instance->table} inner join pelanggan on transaksi.id_pelanggan = pelanggan.id
                                        where transaksi.deleted_at is not null and transaksi.deleted_at != '-infinity' order by transaksi.id")->fetchAll();
    }
    public static function find($id)
    {
        $instance = new static();
        return $instance->conn->query("select transaksi.id as \"id\", transaksi.tanggal_transaksi, transaksi.status_pembayaran, pelanggan.id as \"id_pelanggan\", pelanggan.nama, pelanggan.alamat from {$instance->table}
                                        inner join pelanggan on transaksi.id_pelanggan = pelanggan.id
                                        where transaksi.id = {$id}")->fetch();
    }
}
