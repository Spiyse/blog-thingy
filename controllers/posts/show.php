<?php 
if(!isset($_GET["id"]) || $_GET["id"] == ""){
    redirectIfNotFound();
}

$sql = "SELECT * FROM posts WHERE id = :id";
$params = ["id" => $_GET["id"]];
$post = $db->query($sql,$params)->fetch(); 

if(!$post){
    redirectIfNotFound();
}

$sql = "SELECT categories.category_name FROM categories
    INNER JOIN posts ON posts.category_id = categories.id
    WHERE posts.id = :id";
$categories = $db->query($sql, $params)->fetchAll();

require "views/posts/show.view.php";