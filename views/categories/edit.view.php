<?php require "./views/components/header.php";?>
<?php require "./views/components/navbar.php";?>
    <h1>Rediģēt <?= $post["category_name"] ?></h1>
    <form method="POST">

    <label>Kategorija
    <input name="category_name" value ='<?=  htmlspecialchars($_POST['category_name'] ?? $post['category_name'])?>'/>
    <input name="id" value = <?= htmlspecialchars($post["id"]) ?> type = "hidden"/>
    </label>
    <?php if(isset($errors["category_name"])){?>
     <p style="color:red;"><?=htmlspecialchars($errors["category_name"])?></p>
    <?php } ?></br>

    <button>Saglabāt</button>
    </form>
<?php require "./views/components/footer.php";?>