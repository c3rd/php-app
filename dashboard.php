<?php
session_start();
if (empty($_SESSION['username'])) {
    $_SESSION['message'] = 'You need to be logged in to acess';
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="public/images/logo.svg" alt="Logo" class="logo">
    </header>
    <main class="container">
        <section class="form">
            <h3 class="section-title">Create News</h3>
            <form method="post">
                <input class="form-input" type="text" id="title" name="title" placeholder="Title" required>
                <input class="form-input" type="textarea" id="description" name="description" placeholder="Description" required>
                <input class="form-button" type="submit" value="Create">
                <a href="logout.php" class="form-button">Logout</a>
            </form>
        </section>
    </main>
</body>
</html>