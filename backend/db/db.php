<?php

$servername = "localhost";
$username = "root";
$password = "";


try {
	$dbname = "mydb";
	$db = new PDO("mysql:host=$servername", $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$dbname = "`" . str_replace("`", "``", $dbname) . "`";
	$db->query("CREATE DATABASE IF NOT EXISTS $dbname");
	$db->query("use $dbname");
	// set the PDO error mode to exception
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "connected successfully \n";
} catch (PDOException $e) {
	echo "connection failed: " . $e->getMessage();
}

