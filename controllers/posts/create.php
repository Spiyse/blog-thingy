<?php
require "Validator.php";
$pageTitle = "Emuārs - Izveidot";
$sql_query="SELECT * FROM categories";
$params =[];
$categories = $db->query($sql_query,$params)->fetchAll();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $errors = [];
    if(!Validator::string($_POST["content"],max: 50)){
        $errors["content"] = "Saturam jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
    }
    if (!Validator::number($_POST["category_id"], min: 1)) {
        $errors["category_id"] = "Lūdzu, izvēlieties kategoriju";
    }
    if (empty($errors)){
        $sql = "INSERT INTO posts (content,category_id)
        VALUES(:name,:category_id)";
    $params = ["name" => $_POST["content"],"category_id" => $_POST["category_id"]];
    $db->query($sql, $params);
    header("Location: /");
    exit();
    }

}
require "views/posts/create.view.php";