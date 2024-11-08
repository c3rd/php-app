<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === 'admin' && $password === 'test') {
    $_SESSION['username'] = $username;
    header('Location: dashboard.php');
} else {
    $_SESSION['message'] = 'Wrong Login Data!';
    header('Location: index.php');
}

?>