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
function createShow($name, $about,$image, $release, $type,$imdb_textfield)
{
	global $show;
	global $db;

	try {

		$sql = "INSERT INTO $show (name,about,image,release_date,type,imdb_textfield) 
		values(:name,:about,:image,:release,:type,:imdb);";
		// var_dump($sql);
		$prp = $db->prepare($sql);
		$prp->execute([
			'name' => $name, 'about' => $about,
			'release' => $release, 'type' => $type, 'image' => $image, 'imdb' => $imdb_textfield
		]);
		// print("Created User $handle.\n");
	} catch (PDOException $e) {
		echo "ERERE";
		echo   $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

// createUser("Abi", "abi", "abi", "abi");

function retrieveShowList($s)
{
	global $show;
	global $db;

	if($s != '')
	{
		try {
		$sql = "select * from $show WHERE name LIKE '%".$s."%'";
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
	else
	{
		try {
		$sql = "select * from $show ";
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
