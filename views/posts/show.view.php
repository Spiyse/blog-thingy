<?php require "./views/components/header.php";?>
<?php require "./views/components/navbar.php";?>
    <h1><?= htmlspecialchars($post["content"]) ?></h1>
    <a href="edit?id=<?= $post["id"] ?>">Rediģēt ierakstu</a>
<?php require "./views/components/footer.php";?>