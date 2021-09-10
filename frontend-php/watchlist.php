<?php
require_once("./shared/header.php");

$handle = "";
$search = "";
require_once("../backend/db/watchlist.php");
require_once("./Indlist.php");

$res = getList($handle, $search);

?>

<div>

	<form class="d-flex justify-content-between pb-3 pt-3">
		<div class="col-7">
			<div class="input-group">
				<label htmlFor="searchField" class="input-group-text">
					Search
				</label>
				<input class="form-control" placeholder="Type to search..." />
			</div>
		</div>

		<button class="btn" type="submit">
			<i class="bi bi-search"></i>
		</button>

		<div class="col-4">
			<div class="input-group">
				<label htmlFor="searchField" class="input-group-text">
					User
				</label>
				<input class="form-control" placeholder="Keep empty for any" />
			</div>
		</div>
	</form>

	<div class="list row flex-wrap">
		<?php

		foreach ($res as $key => $value) {
			indList($value);
		}
		// <IndList id={id} key={id} />
		?>
	</div>
</div>

<?php
require_once("./shared/footer.php");
?>