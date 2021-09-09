<?php

require_once("db.php");


$users = "`Users`";

function createUserTable()
{
	global $users;
	global $db;
	try {
		$sql = " CREATE table IF NOT EXISTS $users (
  		`id` int AUTO_INCREMENT ,
  		`type` int DEFAULT 0,
  		`name` tinytext,
  		`about` text,
  		`handle` tinytext Unique,
  		`password` tinytext,
  		`image` text,
  		`created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  		`email` tinytext,
  		PRIMARY KEY (`id`)
		);";
		$db->exec($sql);
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
		$prp->execute(['name' => $name, 'handle' => $handle, 'email' => $email, 'hashed' => $hashed]);
	} catch (PDOException $e) {
		echo "Failed to create User <br>";
		//echo   $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

//createUser("Abi", "abi", "abi", "abi");

// @ User
function updateUser($name, $handle, $email, $about, $password)
{
	global $users;
	global $db;

	try {
		$hashed = hash("sha512", $password);

		$sql = "UPDATE $users set `name`=:name,email=:email,about=:about" . ($password == "" ? " " : ",password=:hashed ") . "WHERE handle=:handle";

		var_dump($sql);
		$prp = $db->prepare($sql);
		$arr = ['name' => $name, 'handle' => $handle, 'email' => $email, 'about' => $about];
		if ($password != "") $arr["hashed"] = $hashed;

		$prp->execute($arr);
	} catch (PDOException $e) {
		echo "Failed to create User <br>";
		//echo   $e->getMessage(); //Remove or change message in production code
	}
}

function updateImage($handle, $image)
{
	global $users;
	global $db;

	try {

		$sql = "UPDATE $users SET image=:image WHERE handle=:handle";

		var_dump($sql);
		$prp = $db->prepare($sql);
		$arr = ['handle' => $handle, 'image' => $image];
		$prp->execute($arr);
	} catch (PDOException $e) {
		echo "Failed to create User <br>";
		//echo   $e->getMessage(); //Remove or change message in production code
	}
}

function retrieveUser($handle)
{
	global $users;
	global $db;

	try {
		$sql = "SELECT * from $users where handle=:handle";
		$prp = $db->prepare($sql);
		$prp->execute(["handle" => $handle]);
		$result = $prp->fetch();
		//print("Got user $handle.\n");
		return $result;
	} catch (PDOException $e) {
		echo "Failed To retrieve User <br>";
		// echo $e->getMessage(); //Remove or change message in production code
		echo "<br>";
	}
}

function getAllUser($search = "")
{
	global $users;
	global $db;
	try {
		$sql = "SELECT * from $users";

		if ($search != "") {
			$sql .= " WHERE name LIKE '%$search%'";
		}

		$prp = $db->prepare($sql);
		$prp->execute();
		$result = $prp->fetchAll();
		//print("Got user $handle.\n");
		return $result;
	} catch (PDOException $e) {
		echo "Failed To retrieve User <br>";
		return array();
		// echo $e->getMessage(); //Remove or change message in production code
	}
}

//var_dump(retrieveUser("Abi"));
function updateType($handle, $val)
{
	global $users;
	global $db;
	try {
		$sql = "UPDATE $users set type=$val WHERE handle=:handle";

		$prp = $db->prepare($sql);
		$prp->execute(["handle" => $handle]);
		//print("Got user $handle.\n");
	} catch (PDOException $e) {
		echo "Failed To retrieve User <br>";
		// echo $e->getMessage(); //Remove or change message in production code
	}
}

function deleteUser($handle)
{
	global $users;
	global $db;
	try {
		$sql = "DELETE from $users WHERE handle=:handle";

		$prp = $db->prepare($sql);
		$prp->execute(["handle" => $handle]);
		//print("Got user $handle.\n");
	} catch (PDOException $e) {
		echo "Failed To retrieve User <br>";
		// echo $e->getMessage(); //Remove or change message in production code
	}
};

function userLogIn($handle, $password)
{
	global $users;
	global $db;
	try {
		$hashed = hash("sha512", $password);
		$sql = "SELECT * from $users where handle=:handle and `password`=:password";
		$prp = $db->prepare($sql);
		$prp->execute(["handle" => $handle, "password" => $hashed]);
		$result = $prp->fetch();
		//print("Got user $handle.\n");
		if (!empty($result))
			$_SESSION["handle"] = $handle;
		return true;
	} catch (PDOException $e) {
		echo "Failed To retrieve User <br>";
		return false;
		// echo $e->getMessage(); //Remove or change message in production code
	}
}
