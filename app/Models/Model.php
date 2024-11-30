<?php

namespace App\Models;


class Model
{
    public static function connect()
    {
        \ORM::configure('mysql:host=localhost;dbname=shops');
        \ORM::configure('username', 'root');
        \ORM::configure('password', '');
    }

    public static function findOne($id)
    {
        $table = static::getTable();
        return \ORM::forTable($table)->findOne($id);
    }

    public static function findAll()
    {
        $table = static::getTable();
        // dd($table);
        return \ORM::forTable($table)->findMany();
    }

    public static function table()
    {
        $table = static::getTable();
        // dd($table);
        return \ORM::forTable($table);
    }

}