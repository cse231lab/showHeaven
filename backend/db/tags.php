<?php



require_once("db.php");


$Tags = "`Tags`";


function createTagsTable()
{
	global $Tags;
	global $db;
	try {
		$sql = "CREATE TABLE IF NOT EXISTS $Tags (
				  `id` int AUTO_INCREMENT,
				  `show_id` int,
				  `tag` varchar(20),
				  PRIMARY KEY (`id`),
				  FOREIGN KEY (`show_id`) REFERENCES `Showz`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
				);";
				

		$db->exec($sql);
		//print("Created $show Table.\n");
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

function createTag($show_id,$tag_name)
{
	global $Tags;
	global $db;
	try {
		$sql = "INSERT INTO $Tags (show_id,tag)
				VALUES(:show_id,:tag);
				";
				

		$prp = $db->prepare($sql);
		$prp->execute(['show_id'=>$show_id,'tag'=>$tag_name]);
		//print("Created $show Table.\n");
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

function deleteTag($show_id,$tag_name)
{
	global $Tags;
	global $db;
	try {
		$sql = "DELETE FROM $Tags
				WHERE show_id=:show_id AND tag=:tag;";
				
		$prp = $db->prepare($sql);
		$prp->execute(['show_id'=>$show_id,'tag'=>$tag_name]);
		//print("Created $show Table.\n");
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

function getTags($show_id)
{
	global $Tags;
	global $db;
	try {
		$sql = "SELECT show_id,GROUP_CONCAT(tag) as tags
				FROM $Tags WHERE show_id=:show_id
				GROUP BY show_id";
				
		$prp = $db->prepare($sql);
		$prp->execute(['show_id'=>$show_id]);
		//print("Created $show Table.\n");
		$result = $prp->fetch(PDO::FETCH_ASSOC);
		return $result;
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}



