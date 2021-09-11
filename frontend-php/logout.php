<?php
session_start();
$_SESSION["handle"] = "";
$_SESSION["id"] = -1;
$_SESSION["IS_ADMIN"] = 0;
require_once("./functions.php");
redirect("index.php");
