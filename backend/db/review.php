<?php



require_once("db.php");


$review = "`review`";


function createReviewTable()
{
	global $review;
	global $db;
	try {
		$sql = "CREATE TABLE `review` (
				  `id` int AUTO_INCREMENT,
				  `text` text,
				  `score` tinyint,
				  `show_id` int,
				  `user_id` int,
				  `created_at` datetime DEFAULT CURRENT_TIMESTAMP ,
				  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`),
				  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
				  FOREIGN KEY (`show_id`) REFERENCES `Showz`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
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
function createReview($text,$score,$show_id,$user_id)
{
	global $review;
	global $db;

	try {

		$sql = "INSERT INTO $review (text,score,show_id,user_id) 
		values(:text,:score,:show_id,:user_id);";
		// var_dump($sql);
		$prp = $db->prepare($sql);
		$prp->execute([
			'text' => $text, 'score' => $score,
			'show_id' => $show_id, 'user_id' => $user_id
		]);
		// print("Created User $handle.\n");
	} catch (PDOException $e) {
		echo "ERERE";
		echo   $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

function updateReview($text,$score,$show_id,$user_id)
{
	global $review;
	global $db;

	try {

		$sql = "UPDATE $review set score = :score, text = :text WHERE show_id = :show_id AND user_id = :user_id;";
		// var_dump($sql);
		$prp = $db->prepare($sql);
		$prp->execute([
			'text' => $text, 'score' => $score,
			'show_id' => $show_id, 'user_id' => $user_id
		]);
		// print("Created User $handle.\n");
	} catch (PDOException $e) {
		echo "ERERE";
		echo   $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
}

// createUser("Abi", "abi", "abi", "abi");

function retrieveReviewList($show_id)
{
	global $review;
	global $db;

		try {
		$sql = "select * from $review WHERE show_id = :show_id ";
		$prp = $db->prepare($sql);
		$prp->execute(['show_id' => $show_id]);
		$result = $prp->fetchALL(PDO::FETCH_ASSOC);
		// print("Got season $handle.\n");
		return $result;
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	echo "<br>";
	 

	
}

function deleteReview($show_id,$user_id)
{
	global $review;
	global $db;

		try {
		$sql = "DELETE FROM  $review WHERE show_id = :show_id  AND user_id = :user_id";
		$prp = $db->prepare($sql);
		$prp->execute(['show_id' => $show_id , 'user_id' => $user_id]);
		
		// print("Got season $handle.\n");
		
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	// echo "<br>";
}

function truncReviews()
{
	global $review;
	global $db;

		try {
		$sql = "TRUNCATE $review";
		$prp = $db->prepare($sql);
		$prp->execute();
		
		// print("Got season $handle.\n");
		
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	// echo "<br>";
}

function getReviewAverage($show_id)
{
	global $review;
	global $db;

		try {
		$sql = "SELECT AVG(score) as score FROM $review WHERE show_id=:show_id";
		$prp = $db->prepare($sql);
		$prp->execute(['show_id' => $show_id]);
		$result = $prp->fetch(PDO::FETCH_ASSOC);
		return $result;
		
		// print("Got season $handle.\n");
		
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	// echo "<br>";
}

function getReviewByUser($user_id,$show_id)
{
	global $review;
	global $db;

		try {
		$sql = "SELECT * FROM $review WHERE user_id=:user_id AND show_id=:show_id";
		$prp = $db->prepare($sql);
		$prp->execute(['user_id' => $user_id , 'show_id' => $show_id]);
		$result;
		if($prp->rowCount()==0)
		{
			$result=[];
		}
		else
		{
			$result = $prp->fetch(PDO::FETCH_ASSOC);	
		}
		
		return $result;
		
		// print("Got season $handle.\n");
		
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
	// echo "<br>";
}

// var_dump(retrieveUser("Abi"));
