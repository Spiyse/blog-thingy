<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["id"])) {
    $params = ["id" => $_POST["id"]];
    $db->query("DELETE FROM categories WHERE id = :id", $params);
}
header("Location: /-cat");
exit();