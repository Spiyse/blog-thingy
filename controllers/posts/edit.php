<?php 
require "Validator.php";
$pageTitle = "Emuārs - Izveidot";

$sql_query = "SELECT * FROM categories";
$params = [];
$categories = $db->query($sql_query, $params)->fetchAll();

if(!isset($_GET["id"]) || $_GET["id"] == ""){
    redirectIfNotFound();
}
$sql = "SELECT * FROM posts WHERE id = :id";
$params = ["id" => $_GET["id"],];
$post = $db->query($sql,$params)->fetch(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];
    if(!Validator::string($_POST["content"],max: 50)){
        $errors["content"] = "Saturam jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
    }
    if (!empty($_POST["category_id"]) && !ctype_digit((string)$_POST["category_id"])) {
        $errors["category_id"] = "Kategorija nav derīga";
    }
    if (empty($errors)){
        $sql = "UPDATE posts SET content = :content, category_id = :category_id WHERE id = :id";
        $params = [
            "content" => $_POST["content"],
            "category_id" => $_POST["category_id"] !== "" ? $_POST["category_id"] : null,
            "id" => $_GET["id"],];
        $db->query($sql, $params);
        header("Location: /");
        exit();
    }
}
require "./views/posts/edit.view.php";