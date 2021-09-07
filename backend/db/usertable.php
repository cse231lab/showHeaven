<?php

require_once("./db.php");


$table = "Users";

function createUserTable()
{
	global $table;
	global $db;
	try {
		$sql = "CREATE table $table(
  		`id` int,
  		`type` int,
  		`name` tinytext,
  		`about` text,
  		`handle` tinytext Unique,
  		`password` tinytext,
  		`image` mediumblob,
  		`created_at` datetime,
  		`email` tinytext Unique,
  		PRIMARY KEY (`id`)
		);";
		$db->exec($sql);
		print("Created $table Table.\n");
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

createUserTable();

// @Create User
function createUser($name, $handle, $email, $password)
{
	global $table;
	global $db;

	try {
		$hashed = hash("sha512", $password);
		$sql = "INSERT INTO $table (name,handle,email,password) 
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

function retrieveUser($handle)
{
	global $table;
	global $db;

	try {
		$sql = "select * from $table where handle=:handle";
		$prp = $db->prepare($sql);
		$prp->execute(["handle" => $handle]);
		$result = $prp->fetch();
		print("Got user $handle.\n");
		return $result;
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

var_dump(retrieveUser("Abi"));
