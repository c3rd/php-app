<?php

use Infra\Database\MysqlPDOConnection;

require_once '../../infra/database/DatabaseConnection.php';
require_once '../../infra/database/MysqlPDOConnection.php';
require_once '../../application/repository/IArticleRepository.php';
require_once '../../infra/repository/ArticleRepository.php';
require_once '../../infra/controller/ArticleController.php';
require_once '../../domain/Article.php';

$articleRepository = new \Infra\Repository\ArticleRepository(MysqlPDOConnection::getInstance());
$articleController = new \Infra\Controller\ArticleController($articleRepository);
$articles = $articleController->handleRequest();
?>
<?php if (!empty($articles)) { ?>
    <section class="form">
        <h3 class="section-title">All News</h3>
        <div class="articles">
            <?php foreach ($articles as $article): ?>
            <div class="article">
                <div>
                    <span class="news-title"><?php echo htmlspecialchars($article['title']); ?></span>
                    <span class="news-description"><?php echo htmlspecialchars($article['description']); ?></span>
                </div>
                <div class="actions">
                    <button class="action-icon" onclick="editArticle(<?php echo $article['id']; ?>)"><img src="public/images/pencil.svg" alt="Edit" width="12" height="12"></a>
                    <form action="news.php" method="post">
                        <input type="hidden" name="article_id" value="<?php echo $article['id']; ?>">
                        <input type="hidden" name="action" value="delete">
                        <button class="action-icon" type="submit"><img src="public/images/close.svg" alt="Delete" width="12" height="12"></button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php } ?>
<section class="form">
    <div class="form-header">
        <h3 id="form_header" class="section-title">Create News</h3>
        <button class="action-icon" id="close_edit_mode" onclick="resetForm()" href=""><img src="public/images/close.svg" alt="Close" width="12" height="12"></button>
    </div>
    <form action="news.php" method="post">
        <input type="hidden" id="form_article_id" name="article_id">
        <input class="form-input" type="text" id="title" name="title" placeholder="Title" required>
        <input class="form-input" type="textarea" id="description" name="description" placeholder="Description" required>
        <input class="form-button" type="submit" value="Create">
    </form>
    <form action="auth.php" method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" class="form-button" value="Logout"> 
    </form>
</section>

<script>
    function editArticle(id)
    {
        const articleDiv = event.target.closest('.article'); 
        const title = articleDiv.querySelector('.news-title').textContent;
        const description = articleDiv.querySelector('.news-description').textContent;

        document.getElementById('title').value = title;
        document.getElementById('description').value = description;
        document.getElementById('form_article_id').value = id;
        document.getElementById('form_header').textContent = "Edit News";
        document.querySelector('input.form-button[type="submit"]').value = "Save";
        document.querySelector('#close_edit_mode').style.display = 'block'; 
    }

    function resetForm()
    {
        document.getElementById('title').value = '';
        document.getElementById('description').value = '';
        document.getElementById('form_article_id').value = '';
        document.getElementById('form_header').textContent = "Create News";
        document.querySelector('input.form-button[type="submit"]').value = "Create";
        document.querySelector('#close_edit_mode').style.display = 'none';
    }
</script>