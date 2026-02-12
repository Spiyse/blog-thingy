<?php require "./views/components/header.php";?>
<?php require "./views/components/navbar.php";?>
    <h1>Izveidot bloga ierakstu</h1>
    <form method="POST">

    <label>Bloga raksts<input name="content" value ='<?= $_POST['content'] ?? "" ?>'/></label><br/>
    <label>Kategorija
        <select name="category_id">
            <option value="">-- Izvēlieties kategoriju --</option>
            <?php foreach($categories as $category): ?>
                <option value="<?= $category['id'] ?>" <?= isset($_POST['category_id']) && $_POST['category_id'] == $category['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['category_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
     <?php if(isset($errors["category_id"])) { ?>
       <p><?= $errors["category_id"] ?></p>
     <?php } ?>
     
    <?php if(isset($errors["content"])){?>
     <p><?=$errors["content"]?></p>
    <?php } ?></br>

    <button>Izveidot</button>
    </form>
<?php require "./views/components/footer.php";?>