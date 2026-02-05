<?php require "./views/components/header.php";?>
<?php require "./views/components/navbar.php";?>
    <h1>Izveidot bloga ierakstu</h1>
    <form method="POST">

    <label>Bloga raksts<input name="content" value ='<?= $_POST['content'] ?? "" ?>'/></label><br/>

    <?php if(isset($errors["content"])){?>
     <p><?=$errors["content"]?></p>
    <?php } ?></br>

    <button>Izveidot</button>
    </form>

<?php require "./views/components/footer.php";?>