<?php

require_once "validator.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $commentId = $_GET["id"] ?? "";
    if ($commentId === "") {
        redirectIfNotFound();
    }
    $commentRow = $db->query(
        "SELECT comment_id FROM comments WHERE id = :id",
        ["id" => $commentId]
    )->fetch();

    if (!$commentRow) {
        redirectIfNotFound();
    }

    header("Location: /show?id=" . urlencode($commentRow["comment_id"]));
    exit();
}

$errors = [];
$commentId = $_POST["id"] ?? "";
$postId = $_POST["post_id"] ?? "";
$body = $_POST["coment"] ?? "";

if (!Validator::number($commentId, min: 1)) {
    $errors["id"] = "Komentāra ID nav pareizs";
}

if (!Validator::string($body, max: 200)) {
    $errors["coment"] = "Saturam jābūt ievadītam, bet ne garākam par 200 rakstzīmēm";
}

if ($postId === "" && $commentId !== "") {
    $commentRow = $db->query(
        "SELECT comment_id FROM comments WHERE id = :id",
        ["id" => $commentId]
    )->fetch();
    if ($commentRow) {
        $postId = $commentRow["comment_id"];
    }
}

if (!empty($errors)) {
    if (!Validator::number($postId, min: 1)) {
        redirectIfNotFound();
    }
    $_GET["id"] = $postId;
    $_GET["edit_id"] = $commentId;
    require "controllers/posts/show.php";
    exit();
}

$sql = "UPDATE comments SET coment = :coment WHERE id = :id";
$params = [
    "coment" => $body,
    "id" => $commentId,
];
$db->query($sql, $params);

header("Location: /show?id=" . urlencode($postId));
exit();
