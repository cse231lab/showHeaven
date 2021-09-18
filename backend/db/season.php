<?php


require_once("db.php");


$season = "`Seasons`";

function createSeasonTable()
{
	global $season;
	global $db;
	try {
		$sql = "CREATE TABLE IF NOT EXISTS `Seasons` (
				  `id` int AUTO_INCREMENT,
				  `title` varchar(50),
				  `num` smallint,
				  `show_id` int,
				  PRIMARY KEY (`id`),
				  FOREIGN KEY (`show_id`) REFERENCES `Showz`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
				);";

		$db->exec($sql);
		// print("Created $table Table.\n");
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

// createEpisodeTable();

// @Create User
function createSeason($title, $num, $show_id )
{
	global $season;
	global $db;

	try {
		
		$sql = "INSERT INTO $season (title, num, show_id) 
		values(:title, :num, :show_id)";
		// var_dump($sql);
		$prp = $db->prepare($sql);
		$prp->execute(['num'=>$num,'show_id'=>$show_id,'title'=>$title]);
		// print("Created User $handle.\n");
	} catch (PDOException $e) {
		echo "ERERE";
		echo   $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}
function deleteSeason($season_id )
{
	global $season;
	global $db;

	try {
		
		$sql = "DELETE FROM  $season 
				WHERE id = $season_id";
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

function retrieveSeasonList($show_id)
{
	global $season;
	global $db;

	try {
		$sql = "select * from $season where show_id=:s_id";
		$prp = $db->prepare($sql);
		$prp->execute(["s_id" => $show_id]);
		$result = $prp->fetchALL(PDO::FETCH_ASSOC);
		// print("Got season $handle.\n");
		return $result;
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

// var_dump(retrieveUser("Abi"));
