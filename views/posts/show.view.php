<?php require "./views/components/header.php"; ?>
<?php require "./views/components/navbar.php"; ?>
<h1 class="post-title"><?= htmlspecialchars($post["content"]) ?></h1>

<div class="post-meta">
    <span class="post-category-label">Category</span>
    <div class="post-category-list">
        <?php foreach ($categories as $category): ?>
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

<section class="comments">
    <h2>Komentāri</h2>
    <form action="/comments/create" method="POST" class="comment-form">
        <input name="post_id" value="<?= htmlspecialchars($post["id"]) ?>" type="hidden" />
        <label>
            Autors:
            <input name="autors" value="<?= htmlspecialchars($_POST["autors"] ?? "") ?>" />
        </label>
        <?php if (isset($errors["autors"])) { ?>
            <p style="color:red;"><?= htmlspecialchars($errors["autors"]) ?></p>
        <?php } ?>
        <label>
            Komentārs:
            <textarea name="coment"><?= htmlspecialchars($_POST["coment"] ?? "") ?></textarea>
        </label>
        <?php if (empty($_GET["edit_id"]) && isset($errors["coment"])) { ?>
            <p style="color:red;"><?= htmlspecialchars($errors["coment"]) ?></p>
        <?php } ?>
        <button type="submit">Komentēt</button>

    </form>
    <?php if (!empty($comments)): ?>
        <div class="comment-list">
            <?php foreach ($comments as $comment): ?>
                    <article class="comment-card" id="c<?= $comment["id"] ?>">
                    <header class="comment-meta">
                        <span class="comment-author"><?= htmlspecialchars($comment["author"]) ?></span>
                    </header>

                    <?php if (!empty($_GET["edit_id"]) && (int)$_GET["edit_id"] === (int)$comment["id"]): ?>
                        <form action="/comments/edit" method="POST" class="comment-form inline-edit">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($comment["id"]) ?>" />
                            <input type="hidden" name="post_id" value="<?= htmlspecialchars($post["id"]) ?>" />
                            <label>
                                Komentārs:
                                <textarea name="coment"><?= htmlspecialchars($comment["body"]) ?></textarea>
                            </label>
                            <button type="submit">Saglabāt</button>
                        </form>
                        <?php if (!empty($_GET["edit_id"]) && isset($errors["coment"])) { ?>
                            <p style="color:red;"><?= htmlspecialchars($errors["coment"]) ?></p>
                        <?php } ?><br />
                    <?php else: ?>
                        <p class="comment-body"><?= nl2br(htmlspecialchars($comment["body"])) ?></p>
                    <?php endif; ?>
                    
                    <div class="comment-footer">
                        <?php if (!empty($comment["created_at"])): ?>
                            <time class="comment-date"><?= htmlspecialchars($comment["created_at"]) ?></time>
                        <?php endif; ?>
                        <div class="comment-actions">
                                <a class="action-link" href="/show?id=<?= $post["id"] ?>&edit_id=<?= $comment["id"] ?>#c<?= $comment["id"] ?>">Rediģēt</a>
                            <form action="/comments/delete" method="POST">
                                <input name="id" value="<?= htmlspecialchars($comment["id"]) ?>" type="hidden" />
                                <input name="post_id" value="<?= htmlspecialchars($post["id"]) ?>" type="hidden" />
                                <button class="danger" type="submit">Dzēst</button>
                            </form>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="comment-empty">Nav komentāru. Esi pirmais!</p>
    <?php endif; ?>
</section>





<?php require "./views/components/footer.php"; ?>