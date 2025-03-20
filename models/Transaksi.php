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
        return $instance->conn->query("select {$columns} from {$instance->table} inner join users on transaksi.id_users = users.id
                                        where transaksi.deleted_at is null order by transaksi.id")->fetchAll();
    }
    public static function allDeleted($columns = ["*"])
    {
        $instance = new static();
        $columns = implode(',', $columns);
        return $instance->conn->query("select {$columns} from {$instance->table} inner join users on transaksi.id_users = users.id
                                        where transaksi.deleted_at is not null and transaksi.deleted_at != '-infinity' order by transaksi.id")->fetchAll();
    }
    public static function find($id)
    {
        $instance = new static();
        return $instance->conn->query("select transaksi.id as \"id\", transaksi.created_at, transaksi.status_pembayaran, users.id as \"id_users\", users.name, users.email from {$instance->table}
                                        inner join users on transaksi.id_users = users.id
                                        where transaksi.id = {$id}")->fetch();
    }
}
