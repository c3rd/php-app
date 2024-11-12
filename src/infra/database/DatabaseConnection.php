<?php

namespace Infra\Database;

use PDO;

interface DatabaseConnection {
    public static function getInstance();
    public function getConnection();
    public function query($query, $params);
}