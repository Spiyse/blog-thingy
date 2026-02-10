<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "DELETE FROM posts WHERE id = :id";
    $params = ["id" => $_POST["id"],];
    $db->query($sql,$params);
}
header("Location: /");
exit();