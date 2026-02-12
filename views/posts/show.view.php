<?php require "./views/components/header.php";?>
<?php require "./views/components/navbar.php";?>
    <h1 class="post-title"><?= htmlspecialchars($post["content"]) ?></h1>

    <div class="post-meta">
        <span class="post-category-label">Category</span>
        <div class="post-category-list">
            <?php foreach($categories as $category): ?>
                <span class="post-category"><?= htmlspecialchars($category['category_name']) ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="action-bar">
        <a class="action-link" href="edit?id=<?= $post["id"] ?>">Rediģēt ierakstu</a>
        <form action="/delete" method="POST">
            <input name="id" value=<?= htmlspecialchars($post["id"]) ?> type="hidden" />
            <button class="danger">Delete</button>
        </form>
    </div>
    

<?php require "./views/components/footer.php";?>