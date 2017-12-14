<?php

namespace vendorcore\core\base;

use vendorcore\core\DB;

abstract class Model
{
    protected $pdo;
    protected $table;
    protected $field = 'id';

    public function __construct()
    {
        $this->pdo = DB::instance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table};";
        return $this->pdo->query($sql);
    }

    public function findOne($id, $field = '')
    {
        $field = $field ?: $this->field;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1;";
        return $this->pdo->query($sql,[$id]);
    }

    public function findLike($str, $field, $table = '')
    {
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM $table WHERE $field LIKE ?;";
        return $this->pdo->query($sql,["%$str%"]);
    }
}