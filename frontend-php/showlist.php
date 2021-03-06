<?php
require_once("./shared/header.php");
require_once("../backend/db/show.php");
require_once("../backend/db/review.php");

$list_id = -1;

if (isset($_GET["list_id"])) {
	require_once("../backend/db/watchlist.php");
	$g = getOneList($_GET["list_id"]);

	if (empty($g) || $g["user_id"] != $_SESSION["id"]) {
		redirect("./showlist.php");
	}
	$list_id = $g["id"];
}

?>
<div>
	<form class="d-flex justify-content-between p-3" METHOD="GET" action="showlist.php">
		<div class="col-5 d-flex">
			<div class="input-group">
				<label htmlFor="searchField" class="input-group-text">
					Search
				</label>
				<input class="form-control" id="searchField" placeholder="Type to search..." name="name" />
			</div>

			<button class="btn" type="submit">
				<i class="bi bi-search"></i>
			</button>
		</div>

		<div class="col-2">
			<div class="input-group">
				<label class="input-group-text" htmlFor="inputGroupSelect01">
					Sort By
				</label>
				<select class="form-select" id="inputGroupSelect01" name="order">
					<option value="title">Title</option>
					<option value="release">Release</option>
				</select>
			</div>
		</div>

		<div class="col-4">
			<div class="input-group">

				<label htmlFor="searchField" class="input-group-text">
					Tags
				</label>
				<input class="form-control" id="searchField" placeholder="Type to search..." name="tags" />
			</div>
		</div>
	</form>
</div>
<table class="table">
	<thead>
		<tr>
			<th scope="col"> </th>
			<th scope="col">Title</th>
			<th scope="col">Rating</th>
			<th scope="col">Release Date</th>
			<?php
			if ($list_id != -1) echo "
			<th scope=\"col\">ADD</th>";
			?>
		</tr>
	</thead>
	<tbody>
		<?php

		$res = retrieveShowListByOrder(isset($_GET['name']) ? $_GET['name'] : '', isset($_GET['order']) ? $_GET['order'] : '', isset($_GET['tags']) ? $_GET['tags'] : '');
		foreach ($res as $val) {
			$revscore = getReviewAverage($val['id']);

			echo "
		<tr>
			<td class=\"col-3 col-md-2 col-lg-1\">
				<img src=\"" . $val["image"] . "\" class=\"img-fluid rounded-start\" alt=\"...\" />
			</td>
			<td>
				<a class=\"text-decoration-none ps-5 d-flex align-items-center  link-secondary\" href=\"show.php?sid=" . $val['id'] . "\">
					<h6>" . $val['name'] . "</h6>
				</a>
			</td>
			<td>".$revscore['score']. "</td>
			<td>" . $val['release_date'] . "</td>
			" .
				(($list_id != -1) ? ("
				<td>
				<form method=\"post\"  action=\"./watchlistupdate.php\" id=\"add-to-" . $list_id . "-show-" . $val["id"] . "\">
                    <input type=\"text\" name=\"add_list_to_list_id\" class=\"d-none\" value=\"" .  $list_id . "\" />
                 
					<input type=\"text\" name=\"show_id\" class=\"d-none\" value=\"" .  $val["id"] . "\" />
					
	   		<button class=\"btn p-0\" type=\"submit\" form=\"add-to-" . $list_id . "-show-" . $val["id"] . "\">
											<h5>
												<i class=\"bi bi-file-plus\"></i>
											</h5>
                    </button>
                    </form>
										
										</td>
			") : "")

				. "
		</tr>";
		}

		?>
	</tbody>
</table>

<?php
require_once("./shared/footer.php");
?>