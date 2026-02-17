<?php
require_once "validator.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirectIfNotFound();
}

$errors = [];

$author = $_POST["autors"] ?? "";
$body = $_POST["coment"] ?? "";
$postId = $_POST["post_id"] ?? "";

if (!Validator::string($author, max: 255)) {
    $errors["autors"] = "Autoram jābūt ievadītam, bet ne garākam par 255 rakstzīmēm";
}

if (!Validator::string($body, max: 200)) {
    $errors["coment"] = "Saturam jābūt ievadītam, bet ne garākam par 200 rakstzīmēm";
}

if (!Validator::number($postId, min: 1)) {
    $errors["post_id"] = "Ieraksta ID nav pareizs";
}

if (!empty($errors)) {
    if (!Validator::number($postId, min: 1)) {
        redirectIfNotFound();
    }
    $_GET["id"] = $postId;
    require "controllers/posts/show.php";
    exit();
}

date_default_timezone_set("UTC");
$sql = "INSERT INTO comments (autors, datums, coment, comment_id)
        VALUES (:autors, :datums, :coment, :comment_id)";
$params = [
    "autors" => $author,
    "datums" => date("Y-m-d H:i:s"),
    "coment" => $body,
    "comment_id" => $postId
];

$db->query($sql, $params);

header("Location: /show?id=" . urlencode($postId));
exit();