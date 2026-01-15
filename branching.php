<?php
require_once "functions.php";

$x = "Kaķēni";

$y = $x ?? "Ups!";

dd($y);
