<?php 
session_start();
$_SESSION["handle"] = "";
require_once("./functions.php");
redirect("index.php");