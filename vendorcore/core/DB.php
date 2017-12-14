<?php

namespace vendorcore\core;

use R;

require 'rb-mysql.php';


class DB
{
    protected $pdo;
    private static $instance;
    public static $countSql = 0;
    public static $queries = [];


    protected function __construct()
    {
        $db = require APP . '/config/db.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        //Обычный коннект через pdo
        $this->pdo = new \PDO($db['dsn'],$db['user'],$db['password'],$options);

        //RedBeen ORM  ***********************************
        R::setup($db['dsn'],$db['user'],$db['password'],$options);

        //Заморозить структуру таблицы
//        R::freeze(true);

        //Создание таблицы category и запись в неё
//        $category = R::dispense('category');
//        $category->title = 'еда';
//        $category->description = 'всё что лезет в рот...';
//        R::store($category);

        //Read
        $category = R::load('category',1);
        //Можно обращаться 2-мя способами
//        dd($category->title);
//        dd($category['title']);



    }

    public static function instance()
    {
        if(self::$instance === null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function execute($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function query($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        if($res !== false)
        {
            return $stmt->fetchAll();
        }
        return [];
    }
}