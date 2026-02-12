<?php 
if(!isset($_GET["id"]) || $_GET["id"] == ""){
    redirectIfNotFound();
}

$sql = "SELECT * FROM categories WHERE id = :id";
$params = ["id" => $_GET["id"]];
$post = $db->query($sql, $params)->fetch();

if(!$post){
    redirectIfNotFound();
}

$sql = "SELECT * FROM posts WHERE category_id = :id";
$posts = $db->query($sql, $params)->fetchAll();

require "views/categories/show.view.php";