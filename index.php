<?php

if (empty($_SESSION)) {
    session_start();
}

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
            <div class="flash-message <?php echo isset($_SESSION['status']) && $_SESSION['status'] ?'success' : 'error'; ?>">
                <p><?php echo $_SESSION['message'] ?></p>
            </div>
        <?php }    
            unset($_SESSION['message']);
        ?>
        <?php if (empty($_SESSION['username'])) { include_once 'login.php';?>
        <?php } else { include 'dashboard.php'; } ?>
    </main>
</body>
</html>