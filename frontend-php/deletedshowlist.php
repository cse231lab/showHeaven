<?php
require_once("./shared/header.php");
require_once("../backend/db/deletedshow.php");


	if(isset($_GET['sid']))
	{
		deleteDeletedShow($_GET['sid']);	
	}

?>
<div class="text-center fs-4 ">
	<h2>DELETED SHOWS</h2>

</div>
<table class="table">
	<thead>
		<tr>
			<th scope="col"> </th>
			<th scope="col">Title</th>
			
		</tr>
	</thead>
	<tbody >
		<?php
		$res = retrieveDeletedShowList();

		foreach ($res as $val) {

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

			<td>
				<a class=\"text-decoration-none ps-5 d-flex align-items-center  link-secondary\" href=\"deletedshowlist.php?sid=" . $val['id'] ."\">
					<h6>" . "DELETE PERMAMENTLY" . "</h6>
				</a>
			</td>
			
		</tr>";
		}

		?>
	</tbody>
</table>

<?php
require_once("./shared/footer.php");
?>