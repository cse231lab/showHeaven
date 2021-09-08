<?php

require_once("./db.php");


$watchlist = "watchlist";

function createUserTable()
{
	global $users;
	global $db;
	try {
		$sql = " CREATE table IF NOT EXISTS $users (
  		`id` int AUTO_INCREMENT ,
  		`type` int,
  		`name` tinytext,
  		`about` text,
  		`handle` tinytext Unique,
  		`password` tinytext,
  		`image` mediumblob,
  		`created_at` datetime,
  		`email` tinytext,
  		PRIMARY KEY (`id`)
		);";
		$db->exec($sql);
		print("Created $users Table.\n");
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

createUserTable();

// @Create User
function createUser($name, $handle, $email, $password)
{
	global $users;
	global $db;

	try {
		$hashed = hash("sha512", $password);
		$sql = "INSERT INTO $users (name,handle,email,password) 
		values(:name,:handle,:email,:hashed)";
		var_dump($sql);
		$prp = $db->prepare($sql);
		$prp->execute(['name'=>$name,'handle'=>$handle,'email'=>$email,'hashed'=>$hashed]);
		print("Created User $handle.\n");
	} catch (PDOException $e) {
		echo "ERERE";
		echo   $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

createUser("Abi", "abi", "abi", "abi");

