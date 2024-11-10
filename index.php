<?php
require_once './src/infra/database/DatabaseConnection.php';

use Infra\Database\DatabaseConnection;


if (empty($_SESSION)) {
    session_start();
}
$host = getenv('MYSQL_HOST');
$db = getenv('MYSQL_DATABASE');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dsn = "mysql:host=$host;dbname=$db";

$connection = new DatabaseConnection($dsn, $username, $password);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="public/images/logo.svg" alt="Logo" class="logo">
    </header>
    <main class="container">
        <?php if (empty($_SESSION['username'])) { include_once 'login.php';?>
        <?php } else { include_once 'dashboard.php'; } ?>
    </main>
</body>
</html>