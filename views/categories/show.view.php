<?php require "./views/components/header.php";?>
<?php require "./views/components/navbar.php";?>
    <h1><?= htmlspecialchars($post["category_name"]) ?></h1>
    <div class="action-bar">
        <a class="action-link" href="edit-cat?id=<?= $post["id"] ?>">Rediģēt ierakstu</a>
        <form action="/delete-cat" method="POST">
            <input name="id" value=<?= htmlspecialchars($post["id"]) ?> type="hidden" />
            <button class="danger">Delete</button>
        </form>
    </div>
    <h2>Posts</h2>
    <?php if(count($posts) == 0) { ?>
        <p>Nav atrasts neviens ieraksts.</p>
    <?php } else { ?>
        <ul>
            <?php foreach($posts as $post_item) { ?>
                <li><a href="show?id=<?= $post_item["id"] ?>"><?= htmlspecialchars($post_item["content"]) ?></a></li>
            <?php } ?>
        </ul>
    <?php } ?>
<?php require "./views/components/footer.php";?>