<?php
require_once './src/application/repository/IArticleRepository.php';
require_once './src/infra/repository/ArticleRepository.php';
require_once './src/infra/controller/ArticleController.php';

$host = getenv('MYSQL_HOST');
$db = getenv('MYSQL_DATABASE');
$user = getenv('MYSQL_USER');
$pass = getenv('MYSQL_PASSWORD');

session_start();
if (empty($_SESSION['username'])) {
    $_SESSION['message'] = 'You need to be logged in to acess';
    header('Location: index.php');
}

try {
    $dsn = "mysql:host=$host;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected";
} catch (\Throwable $e) {
    echo "error" . $e->getMessage();
}

$articleRepository = new \Infra\Repository\ArticleRepository($pdo);
$articleController = new \Infra\Controller\ArticleController($articleRepository);
$articles = $articleController->handleRequest();

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
        <?php if (!empty($articles)) { ?>
            <section class="form">
                <h3 class="section-title">All News</h3>
                <div class="articles">
                    <?php foreach ($articles as $article): ?>
                    <div class="article">
                        <div>
                            <span><?php echo htmlspecialchars($article['title']); ?></span>
                            <span><?php echo htmlspecialchars($article['description']); ?></span>
                        </div>
                        <div>
                            <a onclick="editArticle(<?php echo $article['id']; ?>)" href="#">    <img src="public/images/pencil.svg" alt="Edit" width="15" height="15"></a>
                            <a onclick="deleteArticle(<?php echo $article['id']; ?>)" href="#">    <img src="public/images/close.svg" alt="Edit" width="15" height="15"></a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php } ?>
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