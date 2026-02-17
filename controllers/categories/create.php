<?php
require "Validator.php";
$pageTitle = "Emuārs - Izveidot";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if(!Validator::string($_POST["category_name"],max: 25)){
        $errors["category_name"] = "Saturam jābūt ievadītam, bet ne garākam par 25 rakstzīmēm";
    }
    if (empty($errors)){
        $sql = "INSERT INTO categories (category_name)
        VALUES(:name)";
    $params = ["name" => $_POST["category_name"],];
    $db->query($sql, $params);
    header("Location: /-cat");
    exit();
    }
}
require "views/categories/create.view.php";