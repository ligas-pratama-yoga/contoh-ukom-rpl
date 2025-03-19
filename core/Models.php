<?php

namespace Core;

class Models
{
    /**
     * Field untuk koneksi
     * @var null|\PDO
     */
    public $conn = null;

    /**
     * Nama table
     * @var string
     */
    public $table = '';

    /**
     * Query dari Model
     * @var string
     */
    public $query = '';

    public function __construct()
    {
        $this->conn = new \PDO(
            'pgsql:host=localhost;dbname=kasir',
            'postgres',
            'root',
            [\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC]
        );
    }

    /**
     * Method untuk memanggil semua data dari model
     *
     * @param array $name
     * @return array
     */
    public static function all($columns = ["*"])
    {
        $instance = new static();
        $columns = implode(',', $columns);
        return $instance->conn->query("
                                select {$columns} from {$instance->table} 
                                where deleted_at is null or 
                                deleted_at = '-infinity' order by id
                                ")->fetchAll();
    }

    public static function allDeleted($columns = ["*"])
    {
        $instance = new static();
        $columns = implode(',', $columns);
        return $instance->conn->query("
                                        select {$columns} from {$instance->table} 
                                        where deleted_at is not null and 
                                        deleted_at != '-infinity' order by id
                                        ")->fetchAll();
    }

    /**
     * Method untuk memanggil data berdasarkan ID
     *
     * @param string|int $id
     * @return array|mixed
     */
    public static function find($id)
    {
        $instance = new static();
        return $instance->conn->query("select * from {$instance->table} where id = {$id}")->fetch();
    }


    /**
     * Method untuk membuat data pada model
     *
     * @param array $columns_values
     * @return bool|string
     */
    public static function create($columns_values = [])
    {
        if ($columns_values == [] || $columns_values == null) {
            return "Failed, no data given";
        }
        $instance = new static();

        // "insert into table(id, name) values('1', 'Ligas')

        // Columns
        // id, name
        $columns = implode(", ", array_keys($columns_values));

        // Values
        // '1', 'Ligas'
        $values = "'" . implode("', '", array_values($columns_values)) . "'";

        return $instance->conn->query("insert into {$instance->table}({$columns}) values({$values})") == true;
    }

    /**
     * Method untuk mengedit data pada model sesuai dengan data yang dimasukkan
     *
     * @param mixed $columns_values
     * @return Models
     */
    public static function update($columns_values = [])
    {
        $instance = new static();
        $sets = '';

        // update table set "column1" = 'value1', "column2" = 'value2'
        // where "id" = 12;

        foreach ($columns_values as $column => $value) {
            $sets .= "$column = '$value', ";
        }
        $sets = rtrim($sets, ", ");

        $instance->query = "update {$instance->table} set {$sets}";
        return $instance;
    }

    /**
     * Method untuk menghapus data dari model sesuai id yang dimasukkan
     *
     * @param int $id
     * @return bool
     */
    public static function delete($id)
    {
        $instance = new static();
        return $instance->conn->query("delete from {$instance->table} where id = {$id}") == true;
    }

    /**
     * Method untuk menambahkan pengkondisian pada query
     *
     * @param string $column
     * @param int|string $value
     * @return bool
     */
    public function where($column, $value)
    {
        $this->query .= " where $column = '$value'";
        // var_dump($this->query);

        return $this->conn->query($this->query) == true;
    }
}
