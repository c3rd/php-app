<?php
require_once './src/application/repository/IArticleRepository.php';
require_once './src/infra/repository/ArticleRepository.php';
require_once './src/infra/controller/ArticleController.php';
require_once './src/domain/Article.php';

$articleRepository = new \Infra\Repository\ArticleRepository($connection->getPDO());
$articleController = new \Infra\Controller\ArticleController($articleRepository);
$articleController->handleRequest();

$articles = $articleRepository->all();

?>
<?php if (!empty($articles)) { ?>
    <section class="form">
        <h3 class="section-title">All News</h3>
        <div class="articles">
            <?php foreach ($articles as $article): ?>
            <div class="article">
                <div>
                    <span class="title"><?php echo htmlspecialchars($article['title']); ?></span>
                    <span class="description"><?php echo htmlspecialchars($article['description']); ?></span>
                </div>
                <div>
                    <button onclick="editArticle(<?php echo $article['id']; ?>)">    <img src="public/images/pencil.svg" alt="Edit" width="15" height="15"></button>
                    <button onclick="deleteArticle(<?php echo $article['id']; ?>)" href="#">    <img src="public/images/close.svg" alt="Edit" width="15" height="15"></button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php } ?>
<section class="form">
    <div class="form-header">
        <h3 id="form_header" class="section-title">Create News</h3>
        <button id="close_edit_mode" onclick="resetForm()" href=""><img src="public/images/close.svg" alt="Edit" width="15" height="15"></button>
    </div>
    <form method="post">
        <input type="hidden" id="article_id" name="article_id">
        <input class="form-input" type="text" id="title" name="title" placeholder="Title" required>
        <input class="form-input" type="textarea" id="description" name="description" placeholder="Description" required>
        <input class="form-button" type="submit" value="Create">
        <a href="logout.php" class="form-button">Logout</a>
    </form>
</section>

<script>
    function editArticle(id)
    {
        const articleDiv = event.target.closest('.article'); 
        const title = articleDiv.querySelector('.title').textContent;
        const description = articleDiv.querySelector('.description').textContent;

        document.getElementById('title').value = title;
        document.getElementById('description').value = description;
        document.getElementById('article_id').value = id;
        document.getElementById('form_header').textContent = "Edit News";
        document.querySelector('input.form-button[type="submit"]').value = "Save";
        document.querySelector('#close_edit_mode').style.display = 'block'; 
    }

    function resetForm()
    {
        document.getElementById('title').value = '';
        document.getElementById('description').value = '';
        document.getElementById('article_id').value = '';
        document.getElementById('form_header').textContent = "Create News";
        document.querySelector('input.form-button[type="submit"]').value = "Create";
        document.querySelector('#close_edit_mode').style.display = 'none';
    }

    function deleteArticle(id)
    {
        fetch(window.location.href + '?id=' + id)
        .then(data => location.reload());
    }
</script>