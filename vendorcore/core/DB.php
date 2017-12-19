<?php

namespace vendorcore\core;

use R;

require LIBS . '/rb-mysql.php';


class DB
{
    protected $pdo;
    private static $instance;
    public static $countSql = 0;
    public static $queries = [];


    protected function __construct()
    {
        $db = require CONFIG . '/db.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        //Обычный коннект через pdo
        $this->pdo = new \PDO($db['dsn'],$db['user'],$db['password'],$options);

        //RedBeen ORM  ***********************************
        R::setup($db['dsn'],$db['user'],$db['password'],$options);

        //Заморозить структуру таблицы
        R::freeze(true);
        //Debug
//        R::fancyDebug(true);

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