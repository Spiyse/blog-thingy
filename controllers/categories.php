<?php

$pageTitle = "Emuārs - kategorijas";
$sql_query = "SELECT * FROM categories";
$params = [];

if(isset($_GET["search_query"])&& trim($_GET["search_query"]) !=""){
    $sql_query .= " WHERE category_name LIKE :search";
    $params["search"]="%".$_GET["search_query"]."%";
}

$categories = $db->query($sql_query, $params)->fetchAll(PDO::FETCH_ASSOC);

require "./views/categories.view.php";