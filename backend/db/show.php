<?php



require_once("db.php");


$show = "`showz`";


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
		SET `name` =:nm,
		`about`=:ab,
		`release_date`=:release,
		`type`=:tp,
		`imdb_textfield`=:imdb WHERE id =:showId";
		// var_dump($sql);
		$prp = $db->prepare($sql);
		$prp->execute([
			'nm' => $name, 'ab' => $about,
			'release' => $release, 'tp' => $type, 'imdb' => $imdb_textfield,
			"showId" => $show_id
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

		$sql = "UPDATE $show SET image=:img WHERE id=:showId";

		var_dump($sql);

		$prp = $db->prepare($sql);
		$arr = ['showId' => $show_id, 'img' => $image];
		$prp->execute($arr);
	} catch (PDOException $e) {
		echo "Failed to create User <br>";
		//echo   $e->getMessage(); //Remove or change message in production code
	}
}

function getCoverImage($show_id)
{
	global $show;
	global $db;

	try {
		$sql = "SELECT image from $show where id=$show_id";

		$prp = $db->prepare($sql);
		$prp->execute();
		$result = $prp->fetch();
		return $result;
	} catch (PDOException $e) {
		echo "Failed To retrieve User <br>";
		return "";
		// echo $e->getMessage(); //Remove or change message in production code
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
		echo "Failed to delete show <br>";
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

function retrieveShowListByOrder($s='',$orderby='',$tagfilter='')
{
	global $show;
	global $db;
	$type = 1;
	
	if($tagfilter != '')
	{
			$tagfilter = explode(',', $tagfilter);
			$str='';
			// var_dump($tagfilter);
			foreach ($tagfilter as $tg) 
			{
				$str = $str .'\''.$tg.'\',';
			}
			$str = substr($str,0,strlen($str)-1);
	}

	$cs = ($s != '') ? ' and name LIKE \'%'.$s.'%\' ' : ' '; 
	$co = ($orderby != '') ? ' ORDER BY  '. ($orderby=='title'?'name':'release_date') .' ' : ' '; 
	$ct = ($tagfilter != '') ? ' and tag in ('.$str.') ' : ' '; 
	
	
	

	
		try {
			$sql = "SELECT s.id as id,name,about,image,release_date,created_at,updated_at,imdb_textfield,type from $show as s LEFT OUTER JOIN tags as t ON s.id= t.show_id WHERE type=$type ".$cs.$ct."GROUP BY s.id ".$co.";";
			// echo $sql;
			$prp = $db->prepare($sql);
			$prp->execute();
			$result = $prp->fetchALL(PDO::FETCH_ASSOC);
			// print("Got season $handle.\n");
			return $result;
			} 
			catch (PDOException $e) 
			{
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
