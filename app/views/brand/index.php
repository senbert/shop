
<div class="container">
	<h1 class="text-center">Brands</h1>
	
	<a href="/brand/add" class="btn btn-primary mb-3" role="button">Add brand</a>
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
			{% for brand in brands %}
				<tr>
					<th scope="row">{{loop.index}}</th>
					<td>
						<a href="/admin/product/{{product.id}}">{{brand.name}}</a>
					</td>	
					<td>
						<a href="/brand/delete/{{brand.id}}" class="btn-sm btn-danger">Delete</a>
						<a href="/brand/edit/{{brand.id}}" class="btn-sm btn-primary">Edit</a>
					</td>
				</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
