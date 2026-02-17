<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirectIfNotFound();
}

$commentId = $_POST["id"] ?? "";
$postId = $_POST["post_id"] ?? "";


if ($commentId !== "") {
    $params = ["id" => $commentId];
    $db->query("DELETE FROM comments WHERE id = :id", $params);
 }
header("Location: /show?id=" . urlencode($postId));
exit();