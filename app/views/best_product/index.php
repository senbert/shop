<div class="container mt-3">
	{% if product %}
    <h1 class="text-center">{{product.data.name}}</h1>
<!-- content -->
	<a href="#" class="btn btn-primary mb-3" role="button">Edit product</a>
	<a href="/admin/delete_best_product/" class="btn btn-primary mb-3" role="button">Delete Best Product</a>

	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Value</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Name</th>
				<td>{{product.data.name}}</td>
			</tr>
			<tr>
				<th>Price</th>
				<td>{{product.data.price}}$</td>
			</tr>
			<tr>
				<th>Old Price</th>
				<td>{{ product.data.price_old ? product.data.price_old ~ '$' }}</td>
			</tr>
			<tr>
				<th>Description</th>
				<td>{{product.description | raw}}</td>
			</tr>
			<tr>
				<th>Img</th>
				<td><img src="/assets/img/product/min/{{product.img.file_name}}"></td>
			</tr>
				
		</tbody>
	</table>
	{% else  %}
	<p> Товар не существует </p>
	{% endif %}
</div>


