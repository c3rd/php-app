<?php
session_start();
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
            <form method="post">
                <label for="title">Create News</label>
                <input class="form-input" type="text" id="title" name="title" placeholder="Title" required>
                <input class="form-input" type="textarea" id="description" name="description" placeholder="Description" required>
                <input class="form-button" type="submit" value="Create">
                <input class="form-button" type="submit" value="Logout">
            </form>
        </section>
    </main>
</body>
</html>