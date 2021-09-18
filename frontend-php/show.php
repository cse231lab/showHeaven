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

			echo "
			<a href=\"showedit.php?sid=" . $res["id"] . "\" class=\"btn\">
				<i class=\"bi bi-pencil-square\"></i> Edit
			</a>";
			?>
		</h1>

		<h6 class="align-self-center mb-4">
			Tags:
			<?php 

				if($tags != false)
				{
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
							<span>Rating : <?php echo $revscore['score']."/10" ?></span>
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



						foreach ($szn as $x) {
							$epsd = retrieveEpisodeList($x['id']);
							echo "  <div>
										<div class=\"p-3 border-bottom border-2 border-dark font-weight-bold\">
										" . $x['title'] . '<br>' . "
										</div>";
							foreach ($epsd as $ep) {
								echo "
													<div class=\" ps-3 m-2 bg-light bg-gradient \">
														" . $ep['num'] . ") " . $ep['title'] . "
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
					<div class="accordion-body row text-start">
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
							if(isset($_SESSION['id']))
							{
								$tmp = getReviewByUser($_SESSION['id'],$_GET['sid']);
									if($_SESSION['id']!=-1 &&  sizeof($tmp)==0)
									{
										echo "	<a class=\"btn btn-light\" href=\"submitreview.php?sid=".$_GET['sid']."\">
													<i class=\"bi bi-pencil-square\"></i> Add Review
												</a>";
									}
							}
						?>
						
						<?php



						foreach ($rev as $x) {
							$username = retrieveUserById($x['user_id']);


							echo "<div class=\"card\">
							<div class=\"row\">
								<div class=\"col-2\">
									<div class=\"d-flex flex-column\">
										<img class=\"w-100\" src=\"./images/geralt.jpg\" />
										<span>" . 'USER:' . $username['name'] . "</span>
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

									if( $x['user_id']==$_SESSION['id'])
									{
										echo "<a class=\"btn\" href=\""."updatereview.php?sid=".$_GET['sid']." \" >

										<i class=\"bi bi-pencil-square\"></i> Edit
									</a>

									<a class=\"btn\" href=\""."deletereview.php?sid=".$_GET['sid']." \" >

										<i class=\"bi bi-pencil-square\"></i> Delete
									</a>
												
											</div>
										</div>
									</div>";
									}
									else
									{
										echo "	</div>
										</div>
									</div>";
									}


									
						}
						
						?>


						

<div class="modal fade" id="makecomment" tabIndex="-1" aria-labelledby="authModal" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content pb-3">
			<form action="profile.php" METHOD="GET">
				<div class="input-group mb-3">
					<span class="input-group-text">Rating </span>
					<input type="number" class="form-control" placeholder="0.0" value="Season 1" />
				</div>
				<div class="mb-3">
					<label class="form-label">Comment this</label>
					<textarea class="form-control"></textarea>
				</div>
				<input class="btn" type="submit">
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="editComment" tabIndex="-1" aria-labelledby="authModal" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content pb-3">
			<form action="">
				<div class="input-group mb-3">
					<span class="input-group-text">Rating </span>
					<input type="number" class="form-control" placeholder="0.0" value="Season 1" />
				</div>
				<div class="mb-3">
					<label class="form-label">Comment</label>
					<textarea class="form-control"></textarea>
				</div>
				<button class="btn" type="submit">

					Submit
				</button>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="editShow" tabIndex="-1" aria-labelledby="authModal" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content pb-3">
			<div class="modal-header">
				<div class="modal-title d-flex justify-content-between align-items-center w-100">
					<h4>Edit Show</h4>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
			</div>
			<div class="modal-body">
				<form action="">
					<div class="input-group mb-3">
						<span class="input-group-text">Title </span>
						<input type="text" class="form-control" placeholder="Name" value="THE WITCHER" />
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text">Tags</span>
						<input type="text" class="form-control" value="Drama,Fantasy,Action Fiction, Adventure Fiction, Fantasy Television" />
					</div>
					<div class="mb-3">
						<label class="form-label">Description</label>
						<textarea class="form-control" value={`The Witcher is a Polish-American fantasy drama streaming television series created by Lauren Schmidt Hissrich, based on the book series of the same name by Polish writer Andrzej Sapkowski. Set on a fictional, medieval-inspired landmass known as "the Continent" , The Witcher explores the legend of Geralt of Rivia and Princess Ciri, who are linked to each other by destiny.[8] It stars Henry Cavill, Freya Allan and Anya Chalotra. The first season consisted of eight episodes and was released on Netflix in its entirety on December 20, 2019. It was based on The Last Wish and Sword of Destiny, which are collections of short stories that precede the main Witcher saga. The second season, consisting of eight episodes, is scheduled to be released on December 17, 2021.[9][10] Geralt of Rivia, a solitary monster hunter, struggles to find his place in a world where people often prove more wicked than beasts.`}></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Image</label>
						<input class="form-control" type="file" id="formFile" />
					</div>
					<button class="btn" type="submit">

						Submit
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editSeason" tabIndex="-1" aria-labelledby="editSeason" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content pb-3">
			<div class="modal-header">
				<div class="modal-title d-flex justify-content-between align-items-center w-100">
					<h4>
						Edit Season
						<button class="btn p-0 ">
							<i class="bi bi-trash-fill"></i>
						</button>
					</h4>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
			</div>
			<div class="modal-body">
				<form action="">
					<div class="input-group mb-3">
						<span class="input-group-text">Title </span>
						<input type="text" class="form-control" placeholder="Name" value="Season 1" />
					</div>

					<h5>Episodes</h5>

					<div class="  h6 d-flex flex-grow-1">
						<div class="col-10">
							<input type="text" class="form-control" placeholder="Name" value="The End's Beginning" />
						</div>
						<div class="col-2">
							<button class="btn p-0 ">
								<i class="bi bi-trash-fill"></i>
							</button>
						</div>
					</div>
					<div class="  h6 d-flex flex-grow-1">
						<div class="col-10">
							<input type="text" class="form-control" placeholder="Name" value="Four Marks" />
						</div>
						<div class="col-2">
							<button class="btn p-0 ">
								<i class="bi bi-trash-fill"></i>
							</button>
						</div>
					</div>
					<div class="  h6 d-flex flex-grow-1">
						<div class="col-10">
							<input type="text" class="form-control" placeholder="Name" value="Betrayer Moon" />
						</div>
						<div class="col-2">
							<button class="btn p-0 ">
								<i class="bi bi-trash-fill"></i>
							</button>
						</div>
					</div>

					<button class="btn btn-secondary mb-2" type="submit">

						Submit
					</button>
				</form>

				<h5>Add</h5>

				<form action="">
					<div class="d-flex">
						<div class="col-7">
							<div class="input-group mb-3">
								<span class="input-group-text">Name </span>
								<input type="text" class="form-control" placeholder="Name" value="Season 1" />
							</div>
						</div>
						<div class="col-5">
							<button class="btn" type="submit">

								Add Episode <i class="bi bi-plus"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<?php
require_once("./shared/footer.php");
?>