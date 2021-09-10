<?php



require_once("db.php");


$show = "`Showz`";


function createShowTable()
{
	global $show;
	global $db;
	try {
		$sql = "CREATE TABLE IF NOT EXISTS $show (
				  `id` int AUTO_INCREMENT,
				  `name` varchar(50),
				  `about` text,
				  `image` text,
				  `release_date` date,
				  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
				  `updated_at` datetime ON UPDATE CURRENT_TIMESTAMP(),
				   imdb_textfield text, 
				  `type` smallint DEFAULT 0,
				  
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
function createShow($name)
{
	global $show;
	global $db;

	try {

		$sql = "INSERT INTO $show (name,type) 
		values(:nm,0);";
		// var_dump($sql);
		$prp = $db->prepare($sql);
		$prp->execute([
			'nm' => $name
		]);
		// print("Created User $handle.\n");
	} catch (PDOException $e) {
		echo "ERERE";
		echo   $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}


// @Create User
function updateShow($name, $about, $release, $type, $imdb_textfield, $show_id)
{
	global $show;
	global $db;

	try {

		$sql = "UPDATE $show 
		SET `name` = :nm,
		about = :ab,
		release_date = :release,
		`type` = :tp,
		imdb_textfield = : imdb
		
		WHERE id =:showId
		;";
		// var_dump($sql);
		$prp = $db->prepare($sql);
		$prp->execute([
			'name' => $name, 'about' => $about,
			'release' => $release, 'type' => $type, 'imdb' => $imdb_textfield,
			"id" => $show_id
		]);
		// print("Created User $handle.\n");
	} catch (PDOException $e) {
		echo "ERERE";
		echo   $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

function updateShowCover($show_id, $image)
{
	global $show;
	global $db;

	try {

		$sql = "UPDATE $show SET image=:image WHERE id=:showId";

		$prp = $db->prepare($sql);
		$arr = ['showId' => $show_id, 'image' => $image];
		$prp->execute($arr);
	} catch (PDOException $e) {
		echo "Failed to create User <br>";
		//echo   $e->getMessage(); //Remove or change message in production code
	}
}

function deleteShow($show_id)
{
	global $show;
	global $db;

	try {

		$sql = "DELETE from $show WHERE id=:showId";

		$prp = $db->prepare($sql);
		$arr = ['showId' => $show_id];
		$prp->execute($arr);
	} catch (PDOException $e) {
		echo "Failed to create User <br>";
		//echo   $e->getMessage(); //Remove or change message in production code
	}
}


// createUser("Abi", "abi", "abi", "abi");

function retrieveShowList($s, $type = 1)
{
	global $show;
	global $db;

	if ($s != '') {
		try {
			$sql = "SELECT * from $show WHERE type=$type and name LIKE '%" . $s . "%'";
			$prp = $db->prepare($sql);
			$prp->execute();
			$result = $prp->fetchALL(PDO::FETCH_ASSOC);
			// print("Got season $handle.\n");
			return $result;
		} catch (PDOException $e) {
			echo $e->getMessage(); //Remove or change message in production code
		}
		echo "<br>";
	} else {
		try {
			$sql = "select * from $show where type=$type";
			$prp = $db->prepare($sql);
			$prp->execute();
			$result = $prp->fetchALL(PDO::FETCH_ASSOC);
			// print("Got season $handle.\n");
			return $result;
		} catch (PDOException $e) {
			echo $e->getMessage(); //Remove or change message in production code
		}
		echo "<br>";
	}
}

function retrieveShow($show_id)
{
	global $show;
	global $db;

	try {
		$sql = "select * from $show where id = :s_id";
		$prp = $db->prepare($sql);
		$prp->execute(["s_id" => $show_id]);
		$result = $prp->fetch(PDO::FETCH_ASSOC);

		// print("Got season $handle.\n");
		return $result;
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	// echo "<br>";
}

function truncShows()
{
	global $show;
	global $db;

	try {
		$sql = "TRUNCATE $show";
		$db->exec($sql);
		// print("Got season $handle.\n");

	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	// echo "<br>";
}

// var_dump(retrieveUser("Abi"));
