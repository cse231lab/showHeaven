<?php
require_once("./shared/header.php");
require_once("../backend/db/show.php");
require_once("../backend/db/season.php");
require_once("../backend/db/episode.php");
require_once("../backend/db/review.php");
require_once("../backend/db/usertable.php");
require_once("../backend/db/tags.php");

// echo $_GET['sid'].'<br>';
require_once("functions.php");

if (!isset($_GET["sid"])) {
	redirect("./showlist.php");
}

$res = retrieveShow($_GET['sid']);
if (empty($res) || ($res["type"] == 0 && $_SESSION["IS_ADMIN"] == 0)) {
	redirect("./showlist.php");
}
$szn = retrieveSeasonList($_GET['sid']);
$rev = retrieveReviewList($_GET['sid']);

$revscore = getReviewAverage($_GET['sid']);

$tags = getTags($_GET['sid']);



?>


<div class="p-3 d-flex flex-column m-auto shadow-lg bg-light border border-2 border-light  align-items-center rounded m-3 justify-content-around show">
	<div class="d-flex flex-column justify-content-start align-self-stretch align-items-start me-3 flex-grow-1 ">
		<h1 class="align-self-center m-2">
			<?php echo $res['name'] ?>
			<?php

			if (isset($_SESSION["IS_ADMIN"]) && $_SESSION['IS_ADMIN']) {
				echo "
	<a href=\"showedit.php?sid=" . $res["id"] . "\" class=\"btn\">
	<i class=\"bi bi-pencil-square\"></i> Edit
	</a>";
			}
			?>
		</h1>

		<h6 class="align-self-center mb-4">
			Tags:
			<?php

			if ($tags != false) {
				echo $tags['tags'];
			}

			?>
		</h6>

		<div class="mb-4 d-flex justify-content-center align-items-center align-self-center border border-4 border-dark rounded shadow-lg">
			<img src="<?php echo $res["image"] ?>" class="dp" />
		</div>

		<div class="accordion d-flex flex-column   align-self-stretch " id="accordionExample">
			<div class="accordion-item  ">
				<h2 class="accordion-header  " id="headingOne">
					<button class="accordion-button bg-dark bg-gradient text-white fs-4  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						Description
					</button>
				</h2>

				<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
					<div class="accordion-body text-start">
						<div>
							<?php echo $res['about'] ?>;
						</div>
						<div class="d-flex flex-column pt-5">
							<span>Rating : <?php echo $revscore['score'] . "/10" ?></span>
							<span><?php echo $res['release_date'] ?>;</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="accordion d-flex flex-column mt-1  align-self-stretch " id="accordionExample">
			<div class="accordion-item  ">
				<h2 class="accordion-header   " id="headingSeason">
					<button class="accordion-button bg-dark bg-gradient text-white fs-4  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeason" aria-expanded="true" aria-controls="collapseSeason">
						Seasons
					</button>
				</h2>

				<div id="collapseSeason" class="accordion-collapse collapse show" aria-labelledby="headingSeason">
					<div class="accordion-body text-start">

						<?php

						if (isset($_POST['submitseason'])) {


							if (!empty($_POST['submitseasontitle']) && !empty($_POST['submitseasonnum'])) {
								// echo 'is set';
								createSeason($_POST['submitseasontitle'], $_POST['submitseasonnum'], $_GET['sid']);
								redirect("./show.php?sid=" . $_GET['sid']);
								die();
							} else {
								echo " <div class=\"bg bg-danger mb-2 \">Please enter all fields </div> ";
							}
						}



						?>

						<?php
						if (isset($_SESSION["IS_ADMIN"]) && $_SESSION['IS_ADMIN']) {
							echo "<form class =\"d-flex\" method=\"POST\" action=\"show.php?sid=" . $_GET['sid'] . "\" >
							<span class=\"input-group-text \">Title</span>
							<input class=\" me-2\" type=\"text\" name=\"submitseasontitle\">
							<span class=\"input-group-text \">Season Number</span>
							<input class=\" me-2\" type=\"number\" name=\"submitseasonnum\">
							<input class=\"bg-dark bg-gradient text-light\" type = \"submit\" value=\"Add Season\" name=\"submitseason\">
						</form>";
						}

						?>

						<?php

						foreach ($szn as $x) {

							if (isset($_POST['deleteseason' . $x['id']])) {
								// echo 'deleteseason'.$x['id'];
								deleteSeason($x['id']);
								redirect("./show.php?sid=" . $_GET['sid']);
								die();
							}
							$epsd = retrieveEpisodeList($x['id']);
							$deleteseasonbtn = (isset($_SESSION["IS_ADMIN"]) && $_SESSION['IS_ADMIN']) ?  "<form class =\"d-flex  p-1\" method=\"POST\" action=\"show.php?sid=" . $_GET['sid'] . "\" >
												<input class=\"bg-dark bg-gradient text-light \" type = \"submit\" value=\"Delete season\" name=\"deleteseason" . $x['id'] . "\">
												</form>" : '';
							echo "  <div>
										<div class=\"d-flex p-3 justify-content-between align-items-center mt-4 bg-light mb-3 border-bottom border-top border-2 border-dark font-weight-bold\">
										" . $x['title'] . $deleteseasonbtn . '<br>' . "
										</div>";



							if (isset($_POST['submitepisode' . $x['id']])) {


								if (!empty($_POST['submitepisodetitle']) && !empty($_POST['submitepisodenum'])) {
									// echo $_POST['submitepisodetitle'].' '.$_POST['submitepisodenum'];

									createEpisode($_POST['submitepisodenum'], $x['id'], $_POST['submitepisodetitle']);
									redirect("./show.php?sid=" . $_GET['sid']);
									die();
								} else {

									echo " <div class=\"bg bg-danger mb-2 \">Please enter all fields </div> ";
								}
							}

							if (isset($_SESSION["IS_ADMIN"]) && $_SESSION['IS_ADMIN']) {
								echo "	<form class =\"d-flex\" method=\"POST\" action=\"show.php?sid=" . $_GET['sid'] . "\" >
															<span class=\"input-group-text \">Episode Name</span>
															<input class=\" me-2\" type=\"text\" name=\"submitepisodetitle\">
															<span class=\"input-group-text \">Episode Number</span>
															<input class=\" me-2\" type=\"number\" name=\"submitepisodenum\">
															<input class=\"bg-dark bg-gradient text-light\" type = \"submit\" value=\"Add Episode\" name=\"submitepisode" . $x['id'] . "\">
														</form>";
							}






							foreach ($epsd as $ep) {


								if (isset($_POST['deleteepisode' . $ep['id']])) {
									// echo 'deleteseason'.$x['id'];
									deleteEpisode($ep['id']);
									redirect("./show.php?sid=" . $_GET['sid']);
									die();
								}


								$deleteepisodebtn = (isset($_SESSION["IS_ADMIN"]) && $_SESSION['IS_ADMIN']) ?  "<form class =\"d-flex  p-1\" method=\"POST\" action=\"show.php?sid=" . $_GET['sid'] . "\" >
												<input class=\"bg-dark bg-gradient text-light \" type = \"submit\" value=\"Delete episode\" name=\"deleteepisode" . $ep['id'] . "\">
												</form>" : '';

								echo "
													<div class=\" d-flex justify-content-start align-items-center ps-3  m-2 bg-light bg-gradient \">
														" . $ep['num'] . ") " . $ep['title'] . "
														<div class=\" ps-3 \">
														" . $deleteepisodebtn . "
														</div>
													</div>
													";
							}
							echo " 	</div>";
						}

						?>



					</div>
				</div>
			</div>
		</div>

		<div class="accordion d-flex flex-column mt-1  align-self-stretch " id="accordionExample">
			<div class="accordion-item  ">
				<h2 class="accordion-header   " id="headingTwo">
					<button class="accordion-button bg-dark bg-gradient text-white fs-4  " type="button" data-bs-toggle="collapse" data-bs-target="#collapsecast" aria-expanded="true" aria-controls="collapsecast">
						Cast
					</button>
				</h2>

				<div id="collapsecast" class="accordion-collapse collapse show" aria-labelledby="headingTwo">
					<div class="accordion-body row text-start" id="cast-content" data-show_imdb="<?php echo $res["imdb_textfield"]; ?>">
						<div class="col-3 mb-1 me-1">
							<div class="card">
								<img class="w-100" src="./images/geralt.jpg" />
								<div class="card-body">
									<h5 class="card-title">Geralt</h5>
									<p class="card-text">Name</p>
								</div>
							</div>
						</div>
						<div class="col-3 mb-1 me-1">
							<div class="card">
								<img class="w-100" src="./images/geralt.jpg" />
								<div class="card-body">
									<h5 class="card-title">Geralt</h5>
									<p class="card-text">Name</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					(function() {
						let d = document.querySelector("#cast-content");
						let apikey = "7c8b48b8787a5f4df8b62b35aeefc6e7";
						let showid = d.getAttribute("data-show_imdb");

						fetch(`https://api.themoviedb.org/3/tv/${showid}/credits?api_key=${apikey}&language=en-US`)
							.then(response => response.json())
							.then(data => {
								console.log(data)
								let f = "";

								for (let cast of data.cast) {
									let curr = `
									<div class="col-3 p-1">
							<div class="card">
								<img class="w-100" src="https://image.tmdb.org/t/p/original/${cast.profile_path}" />
								<div class="card-body">
									<h5 class="card-title">${cast.character}</h5>
									<p class="card-text">${cast.name}</p>
								</div>
							</div>
						</div>
									`;

									f += curr;
								}

								d.innerHTML = f;
							})
							.catch(err => {
								console.error(err);
							});
					})();
				</script>
			</div>
		</div>

		<div class="accordion d-flex flex-column  mt-1 align-self-stretch " id="accordionExample">
			<div class="accordion-item  ">
				<h2 class="accordion-header   " id="headingThree">
					<button class="accordion-button bg-dark bg-gradient text-white fs-4  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
						Reviews
					</button>
				</h2>

				<div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree">
					<div class="accordion-body text-start">

						<?php
						if (isset($_SESSION['id'])) {
							$tmp = getReviewByUser($_SESSION['id'], $_GET['sid']);
							if ($_SESSION['id'] != -1 &&  sizeof($tmp) == 0) {
								echo "	<a class=\"btn btn-light\" href=\"submitreview.php?sid=" . $_GET['sid'] . "\">
													<i class=\"bi bi-pencil-square\"></i> Add Review
												</a>";
							}
						}
						?>

						<?php



						foreach ($rev as $x) {
							$username = retrieveUserById($x['user_id']);


							echo "
						<div class=\"card\">
							<div class=\"row\">
								<div class=\"col-2\">
									<div class=\"d-flex flex-column\">
										<img class=\"w-100\" src=\"" . $username["image"] . "\" />
										<span class=\"ps-1\">  " . $username['name'] . "</span>
									</div>
								</div>
								<div class=\"card-body col-10\">
									<div class=\"d-flex justify-content-between align-items-center\">
										<h5 class=\"card-title\"> " . 'Rating: ' . $x['score'] . "</h5>
										<h6 class=\"card-subtitle text-end mb-2 text-muted\">
											" . $x['created_at'] . "
										</h6>
									</div>
									<p class=\"card-text\">
										" . $x['text'] . "
										
									</p>";

							if ($x['user_id'] == $_SESSION['id']) {
								echo "<a class=\"btn\" href=\"" . "updatereview.php?sid=" . $_GET['sid'] . " \" >

										<i class=\"bi bi-pencil-square\"></i> Edit
									</a>

									<a class=\"btn\" href=\"" . "deletereview.php?sid=" . $_GET['sid'] . " \" >

										<i class=\"bi bi-pencil-square\"></i> Delete
									</a>
												
								</div>
							</div>
						</div>
											";
							} else {
								echo "			
								</div>
							</div>
						</div>
											";
							}
						}

						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>






<?php
require_once("./shared/footer.php");
?>