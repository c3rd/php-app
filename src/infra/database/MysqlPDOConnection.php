<?php

namespace Infra\Database;

use PDO;

class MysqlPDOConnection implements DatabaseConnection{

    private static $instance;
    private $connection;

    public function __construct()
    {
        $username = getenv('MYSQL_USER');
        $password = getenv('MYSQL_PASSWORD');
        $stringConnection = "mysql:host=" . getenv('MYSQL_HOST') .";dbname=" . getenv('MYSQL_DATABASE');
        $this->connection = new PDO($stringConnection, $username, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new MysqlPDOConnection();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function query($query, $params)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        
        if (stripos($query, 'select') === 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $statement;
    }

}