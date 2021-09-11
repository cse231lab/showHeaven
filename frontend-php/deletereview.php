<?php
	
	require_once("./functions.php");
	header("Location: show.php?".$_GET['sid']);
	require_once("./shared/header.php");
	
	require_once("../backend/db/review.php");

 	$sid = $_GET['sid'];
 	deleteReview($sid,$_SESSION['id']);
 	// echo 'deleted review';




?>

