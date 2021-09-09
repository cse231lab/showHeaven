<?php
require_once("./shared/header.php");
require_once("../backend/db/show.php");
?>
<div>
	<form class="d-flex justify-content-between p-3">
		<div class="col-5 d-flex">
			<div class="input-group">
				<label htmlFor="searchField" class="input-group-text">
					Search
				</label>
				<input class="form-control" id="searchField" placeholder="Type to search..." />
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
				<select class="form-select" id="inputGroupSelect01">
					<option value="title">Tittle</option>
					<option value="release">Release</option>
					<option value="rating">Rating</option>
				</select>
			</div>
		</div>

		<div class="col-4">
			<div class="input-group">

				<label htmlFor="searchField" class="input-group-text">
					Tags
				</label>
				<input class="form-control" id="searchField" placeholder="Type to search..." />
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
			<th scope="col">ADD</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$res = retrieveShowList();
		foreach($res as $val)
		{

		echo "
		<tr>
			<td class=\"col-3 col-md-2 col-lg-1\">
				<img src=\"./images/img1.jpg\" class=\"img-fluid rounded-start\" alt=\"...\" />
			</td>
			<td>
				<a class=\"text-decoration-none ps-5 d-flex align-items-center  link-secondary\" href=\"show.php?sid=".$val['id']."\">
					<h6>".$val['name']."</h6>
				</a>
			</td>
			<td>9.8</td>
			<td>".$val['release_date']."</td>
			<td>
				<button class=\"text-decoration-none btn link-secondary\">
					<h5>
						<i class=\"bi bi-file-plus\"></i>
					</h5>
				</button>
			</td>
		</tr>";
		}

		?>
	</tbody>
</table>

<?php
require_once("./shared/footer.php");
?>