<?php



require_once("db.php");


$deletedshow = "`deletedshowz`";


function createDeletedShowTable()
{
	global $deletedshow;
	global $db;
	try {
		$sql = "CREATE TABLE IF NOT EXISTS $deletedshow (
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

function retrieveDeletedShowList()
{
	global $deletedshow; 
	global $db;

	
		try {
			$sql = "SELECT * from $deletedshow";
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

function deleteDeletedShow($show_id)
{
	global $deletedshow;
	global $db;

	try {

		$sql = "DELETE from $deletedshow WHERE id=:showId";

		$prp = $db->prepare($sql);
		$arr = ['showId' => $show_id];
		$prp->execute($arr);
	} catch (PDOException $e) {
		echo "Failed to delete show <br>";
		//echo   $e->getMessage(); //Remove or change message in production code
	}
}



