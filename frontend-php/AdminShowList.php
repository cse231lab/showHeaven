
<table class="table">
	<thead>
		<tr>
			<th scope="col"> # </th>
			<th scope="col">Name</th>
			<th scope="col">Approve</th>
			<th scope="col">Delete</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{index + 1}</td>
			<td>
				<a class="text-decoration-none link-secondary" href="./show?id=${dat.id}">
					<h5>{show.title}</h5>
				</a>
			</td>
			<td>
				<div class="form-check form-check d-flex justify-content-center">
					<input class="form-check-input" type="checkbox" value="" defaultChecked={false} id="flexCheckDefault" />
				</div>
			</td>
			<td>
				<button class="btn">
					<i class="bi bi-trash-fill"></i>
				</button>
			</td>
		</tr>
	</tbody>
</table>