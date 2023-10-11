<?php

namespace App\Database;

use PDO;
use PDOStatement;

class DB
{

    protected static null | PDO $instance = null;

    private function __construct(){}

    // \PDO - это обращение к оригинальному классу pdo
    public static function instance() : PDO
    {
        if (self::$instance == null) {
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO:: ATTR_EMULATE_PREPARES => TRUE,
                PDO:: ATTR_PERSISTENT => true
            );

            $connectString = 'mysql:host='. $_ENV["DB_HOST"] . ';port= ' . $_ENV["DB_PORT"] . ';dbname=' . $_ENV["MYSQL_DATABASE"]. ';';
            self::$instance = new PDO($connectString, $_ENV["DB_USER"], $_ENV["MYSQL_ROOT_PASSWORD"], $options);
        }

        return self::$instance;
    }

    private static function sql($sql, $args =[]): PDOstatement|false{

        $stmt = self::instance()->prepare($sql);
        $stmt -> execute($args);
        return $stmt;
    }

    public static function Create (string $tableName): false | PDOStatement
    {
        $createQuery = "CREATE TABLE {$tableName} (
                id INT PRIMARY KEY,
                name VARCHAR(255),
                distance FLOAT (3),
                time INT,
                price FLOAT (3)
                );";
        return self::sql($createQuery);
    }

    public static function Select($sql, $args=[]) : false | array
    {
        return self::sql($sql,$args)->fetchAll();
    }

    static function getRow($sql,$args=[])
    {
        return self::sql($sql,$args)->fetch();

    }


    static function Insert($sql,$args=[]) : int | false
    {
        self::sql($sql,$args);
        return self::instance()->lastInsertId();

    }

    static function Update($sql,$args=[]) : int | false
    {
        $stmt = self::sql($sql,$args);
        return $stmt->rowCount();

    }

    static function Delete($sql,$args=[]) : int | false
    {
        $stmt = self::sql($sql,$args);
        return $stmt->rowCount();

    }

}