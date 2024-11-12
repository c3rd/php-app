<?php

namespace Infra\Database;

use PDO;

class DatabaseConnection {

    private static $instance;
    private $connection;

    public function __construct()
    {
        $username = getenv('MYSQL_USER');
        $password = getenv('MYSQL_PASSWORD');
        $dsn = "mysql:host=" . getenv('MYSQL_HOST') .";dbname=" . getenv('MYSQL_DATABASE');
        $this->connection = new PDO($dsn, $username, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function query()
    {

    }

}