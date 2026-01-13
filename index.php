<?php
echo "<h1>Emuārs</h1>";

echo "<form>";
    echo "<input type='text' name='search_query' />";
    echo "<button>Meklēt</button>";
echo "</form>";


require_once "functions.php";
require_once "Database.php";
$config = require "config.php";

$db = new Database($config["database"]);
$sql_query = "SELECT * FROM posts";
$params = [];

if(isset($_GET["search_query"])&& trim($_GET["search_query"]) !=""){
    $sql_query .= " WHERE content LIKE :search";
    $params["search"]="%".$_GET["search_query"]."%";
}

$posts = $db->query($sql_query, $params)->fetchAll(PDO::FETCH_ASSOC);

echo "<ul>";
    foreach($posts as $post) {
        echo "<li>" . $post["content"] . "</li>";
    }
echo "</ul>";