<?php



require_once("db.php");


$tags = "`Tags`";


function createTagsTable()
{
	global $tags;
	global $db;
	try {
		$sql = "CREATE TABLE IF NOT EXISTS $tags (
				  `id` int AUTO_INCREMENT,
				  `show_id` int,
				  `tag` varchar(20),
				  PRIMARY KEY (`id`),
				  FOREIGN KEY (`show_id`) REFERENCES `Showz`(`id`)
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
	global $tags;
	global $db;
	try {
		$sql = "INSERT INTO $tags(show_id,tag)
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
	global $tags;
	global $db;
	try {
		$sql = "DELETE FROM tags
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
	global $tags;
	global $db;
	try {
		$sql = "SELECT show_id,GROUP_CONCAT(tag) as tags
				FROM $tags WHERE show_id=:show_id
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



