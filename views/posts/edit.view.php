<?php require "./views/components/header.php";?>
<?php require "./views/components/navbar.php";?>
    <h1>Rediģēt <?= $post["content"] ?></h1>
    <form method="POST">

    <label>Bloga raksts
    <input name="content" value ='<?=  htmlspecialchars($_POST['content'] ?? $post['content'])?>'/>
    <input name="id" value = <?= htmlspecialchars($post["id"]) ?> type = "hidden"/>
    </label>

    <label>Kategorija
        <select name="category_id">
            <option value="">-- Izvēlieties kategoriju --</option>
            <?php foreach($categories as $category): ?>
                <option value="<?= $category['id'] ?>" <?= (($_POST['category_id'] ?? $post['category_id'] ?? "") == $category['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['category_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <?php if(isset($errors["category_id"])) { ?>
     <p><?= htmlspecialchars($errors["category_id"]) ?></p>
    <?php } ?>
    <?php if(isset($errors["content"])){?>
     <p><?=htmlspecialchars($errors["content"])?></p>
    <?php } ?></br>

    <button>Saglabāt</button>
    </form>
<?php require "./views/components/footer.php";?>