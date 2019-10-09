<?php

namespace Models;

use Core\Database;

abstract class Table{
    protected static $table_name;

    static function select($join = "*", $columns = null, $where = null){
        return Database::instance()->select($join, $columns, $where);
    }

    static function get($join = "*", $columns = null, $where = null){
        return Database::instance()->get(static::$table_name);
    }

    static function has($where){
        return Database::instance()->has(static::$table_name, $where);
    }

    static function insert($data){
        return Database::instance()->insert(static::$table_name, $data);
    }

    static function update($where){
        return Database::instance()->update(static::$table_name, $where);
    }

    static function delete($where){
        return Database::instance()->delete(static::$table_name, $where);
    }

    static function count($where=null){
        return Database::instance()->count(static::$table_name, $where);
    }

    static function getById($id){
        return self::get([
            "id" => $id
        ]);
    }

    static function max($join, $column = null, $where = null){
        return Database::instance()->max(static::$table_name, $join, $column, $where);
    }
}