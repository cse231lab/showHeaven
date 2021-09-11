<?php
	require_once("./shared/header.php");
	require_once("./functions.php");
	require_once("../backend/db/review.php");

 	$sid = $_GET['sid'];


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body  >

	<div class="d-flex flex-column align-items-center">
	<?php 

		if(isset($_POST['comment']))
		{
			$rating = $_POST['rating'];
			$comment = $_POST['comment'];

			
		
			if(empty($rating) || empty($comment))
			{
				echo "<div class=\"border border-dark border-2 w-25 bg-danger  p-3 m-3\">";
				
				if(empty($rating))
				{
					echo "<h5 class=\" \">Enter a rating"."<br>"."</h5>";
				}
				
				
				if(empty($comment))
				{
					echo "<h5 class=\" \">Enter a review"."<br>"."</h5>";
				}
				
			
			}
			else if($rating<0 || $rating>10)
			{
				echo "<div class=\"border border-dark border-2 w-50 bg-danger  p-3 m-3\">";
				echo "<h5 class=\" \">Rating needs to be between 0 and 10 inclusive."."<br>"."</h5>";
			}
			else
			{
				
				createReview($comment,$rating,$sid,$_SESSION['id']);

				echo "<div class=\"border border-dark border-2 w-25 bg-light p-3 m-3 \">";
				echo "<h5 class=\"text-center \">Review submitted!"."<br>"."</h5>"; 


				die();
				
			}

			echo "</div>";

		}
	?>
	
	<div class="border border-dark border-2 m-3 p-3 w-25 d-flex justify-content-center">

				
			<form action=<?php echo "submitreview.php?"."sid=".$sid ?> METHOD="POST">
				<div class="input-group mb-3">
					<span class="input-group-text">Rating </span>
					<input type="number" class="form-control" placeholder="0.0" value="Season 1" name='rating' />
				</div>
				<div class="mb-3">
					<label class="form-label">Comment</label>
					<textarea class="form-control" name="comment"></textarea>
				</div>

				<input class="btn btn-light border border-dark border-2" type="submit" >

				
			</form>
	</div>

</div>
	
</body>
</html>



<?php
require_once("./shared/footer.php");
?>