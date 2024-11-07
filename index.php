<?php
session_start();
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
        <?php if(isset($_SESSION['message'])) { ?>
            <div class="flash-message">
                <p><?php echo $_SESSION['message'] ?></p>
            </div>
        <?php }    
            unset($_SESSION['message']);
        ?>
        <section class="form">
            <form action="authenticate.php" method="post">
                <input class="form-input" type="text" id="username" name="username" placeholder="Username" required>
                <input class="form-input" type="password" id="password" name="password" placeholder="Password" required>
                <input class="form-button" type="submit" value="Login">
            </form>
        </section>
    </main>
</body>
</html>