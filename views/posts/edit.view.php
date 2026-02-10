<?php require "./views/components/header.php";?>
<?php require "./views/components/navbar.php";?>

    <h1>Rediģēt <?= $post["content"] ?></h1>
    <form method="POST">

    <label>Bloga raksts
    <input name="content" value ='<?=  htmlspecialchars($_POST['content'] ?? $post['content'])?>'/>
    <input name="id" value = <?= htmlspecialchars($post["id"]) ?> type = "hidden"/>
    </label>
    <?php if(isset($errors["content"])){?>
     <p><?=htmlspecialchars($errors["content"])?></p>
    <?php } ?></br>

    <button>Saglabāt</button>
    </form>

<?php require "./views/components/footer.php";?>