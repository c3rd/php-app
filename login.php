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