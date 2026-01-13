<?php

require_once "Database.php";
$config = require "config.php";

$db = new Database($config["database"]);
$sql_query = "SELECT * FROM categories";
$params = [];

$categories = $db->query($sql_query, $params)->fetchAll(PDO::FETCH_ASSOC);

echo "<ul>";
foreach ($categories as $category) {
    echo "<li>" . $category["category_name"] . "</li>";
}
echo "</ul>";