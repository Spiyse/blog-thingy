<?php require "./views/components/header.php";?>
<?php require "./views/components/navbar.php";?>
    <h1>Izveidot kategoriju ierakstu</h1>
    <form method="POST">

    <label>Izveido kategoriju<input name="category_name" value ='<?= $_POST['category_name'] ?? "" ?>'/></label><br/>

    <?php if(isset($errors["category_name"])){?>
     <p><?=$errors["category_name"]?></p>
    <?php } ?></br>

    <button>Izveidot</button>
    </form>

<?php require "./views/components/footer.php";?>