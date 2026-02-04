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

require "views/posts/show.view.php";