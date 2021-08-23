{/* <ul class="list-group">
		<li class="list-group-item border-0">
			<div class="card mb-3" >
				<div class="row g-0">
					<div class="col-3">
						<img src="./images/img1.jpg" class="img-fluid rounded-start" alt="...">
					</div>
					<div class="col-8">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
							<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						</div>
					</div>
				</div>
			</div>
		</li>
	</ul> */}

const showListId = "show-list";

// import moment from "./moment.js";
let showList = document.getElementById(showListId);

// Dummy Data Based on DB schema
let data = [{id:1,name:"Code Geass", about:"This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.",
image:"./images/img1.jpg",release:"23/08/2021",updated_at:"23/08/2021",created_at:"23/08/2021", tags : ["anime","action"]}];

// Increasing data count
for(let i = 0; i < 5; i++) {
	let curr = {...data[0]};
	curr.id = i+3;
	data.push(curr);
}

let showData = "";

for(let dat of data){
	let curr = `
	<li class="list-group-item border-0">
	<div class="card mb-3" >
	<div class="row g-0">
	<div class="col-3 d-flex align-items-center">
	<img src="${dat.image}" class="img-fluid rounded-start" alt="...">
	</div>
	<div class="col-8">
	<div class="card-body">
	<a class="card-title" href="./profile.php?id=${dat.id}"><h5>${dat.name}</h5></a>
	<p class="card-text">${dat.about}</p>
	<p class="card-text"> Tags: ${dat.tags.toString()}</p>
	<p class="card-text"><small class="text-muted">${dat.updated_at}</small></p>
	</div>
	</div>
	</div>
	</div>
	</li>
	`;

	showData += curr;
}

showList.innerHTML = showData;