
<div class="container">
	<h1 class="text-center">Products</h1>
	
	<a href="/admin/add_product" class="btn btn-primary mb-3" role="button">Add product</a>
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Image</th>
			<th scope="col">Price</th>
			<th scope="col">Old Price</th>
			<th scope="col">Category</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
			{% for product in products %}
				<tr>
					<th scope="row">{{loop.index}}</th>
					<td>
						<a href="/admin/product/{{product.id}}">{{product.name}}</a>
					</td>
					<td><img src="/assets/img/product/min/{{product.img.file_name}}"></td>
					<td>{{product.price}}$</td>
					<td>
					{% if product.price_old %} 
						{{product.price_old}}$
					{% endif %}
					</td>
					<td>{{product.cat.name}}</td>
					<td>
						<a href="/admin/delete/{{product.id}}" class="btn-sm btn-danger">Delete</a>
						<a href="/admin/edit/{{product.id}}" class="btn-sm btn-primary">Edit</a>
					</td>
				</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
