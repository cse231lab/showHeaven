<?php


require_once("db.php");


$episode = "`Episodes`";

function createEpisodeTable()
{
	global $episode;
	global $db;
	try {
		$sql = "CREATE TABLE IF NOT EXISTS $episode (
			  `id` int AUTO_INCREMENT,
			  `num` mediumint,
			  `season_id` int,
			  `title` tinytext,
			  PRIMARY KEY (`id`),
			  FOREIGN KEY (`season_id`) REFERENCES `Seasons`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
			);";

		$db->exec($sql);
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

 createEpisodeTable();

// @Create User
function createEpisode($num, $season_id, $title)
{
	global $episode;
	global $db;

	try {
		
		$sql = "INSERT INTO $episode (num,season_id,title) 
		values(:num,:season_id,:title)";
		// var_dump($sql);
		$prp = $db->prepare($sql);
		$prp->execute(['num'=>$num,'season_id'=>$season_id,'title'=>$title]);
		// print("Created User $handle.\n");
	} catch (PDOException $e) {
		echo "ERERE";
		echo   $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

function deleteEpisode($episode_id)
{
	global $episode;
	global $db;

	try {
		
		$sql = "DELETE FROM $episode WHERE id=$episode_id";
		// var_dump($sql);
		$prp = $db->prepare($sql);
		$prp->execute();
		// print("Created User $handle.\n");
	} catch (PDOException $e) {
		echo "ERERE";
		echo   $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}


// createUser("Abi", "abi", "abi", "abi");

function retrieveEpisodeList($season_id)
{
	global $episode;
	global $db;

	try {
		$sql = "select * from $episode where season_id=:s_id ORDER BY num";
		$prp = $db->prepare($sql);
		$prp->execute(["s_id" => $season_id]);
		$result = $prp->fetchALL(PDO::FETCH_ASSOC);
		// print("Got season $handle.\n");
		return $result;
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

// var_dump(retrieveUser("Abi"));
