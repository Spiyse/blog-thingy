<?php
require_once "functions.php";

$x = "Kaķēni";

$y = isset($x) ? $x : "Ups!";

// Šis jau ārpus paša if, vienkārši parādu, ka izvadu $y
dd($y);
