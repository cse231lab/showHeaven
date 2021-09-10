<?php
session_start();
$_SESSION["handle"] = "";
$_SESSION["id"] = -1;
require_once("./functions.php");
redirect("index.php");
