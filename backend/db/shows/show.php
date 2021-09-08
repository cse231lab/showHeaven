<?php

require_once("../db.php");


$show = "`Show`";

function createShowTable()
{
	global $show;
	global $db;
	try {
		$sql = "CREATE TABLE IF NOT EXISTS $show (
				  `id` int AUTO_INCREMENT,
				  `name` varchar(50),
				  `about` text,
				  `image` mediumblob,
				  `release` datetime,
				  `created_at` datetime,
				  `updated_at` datetime,
				  `type` smallint,
				  PRIMARY KEY (`id`)
				);";

		$db->exec($sql);
		//print("Created $show Table.\n");
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

createShowTable();

// createEpisodeTable();

// @Create User
function createShow($name, $about, $image, $release, $created_at, $updated_at, $type)
{
	global $show;
	global $db;

	try {

		$sql = "INSERT INTO $show (name,about,image,release,created_at,updated_at,type) 
		values(:name,:about,:image,:release,:created_at,:updated_at,:type)";
		// var_dump($sql);
		$prp = $db->prepare($sql);
		$prp->execute([
			'name' => $name, 'about' => $about,
			'image' => $image, 'release' => $release, 'created_at' => $created_at, 'updated_at' => $updated_at, 'type' => $type
		]);
		// print("Created User $handle.\n");
	} catch (PDOException $e) {
		echo "ERERE";
		echo   $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

// createUser("Abi", "abi", "abi", "abi");

function retrieveShowList()
{
	global $show;
	global $db;

	try {
		$sql = "select * from $show";
		$prp = $db->prepare($sql);
		$prp->execute();
		$result = $prp->fetchALL();
		// print("Got season $handle.\n");
		return $result;
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

function retrieveShow($show_id)
{
	global $show;
	global $db;

	try {
		$sql = "select * from $show where id = :s_id";
		$prp = $db->prepare($sql);
		$prp->execute(["s_id" => $show_id]);
		$result = $prp->fetch();
		// print("Got season $handle.\n");
		return $result;
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

// var_dump(retrieveUser("Abi"));
