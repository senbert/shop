
<div class="container">
	<h1 class="text-center">Discount</h1>
	
	<a href="/admin/add_discount" class="btn btn-primary mb-3" role="button">Add discount</a>
	
	
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Image</th>
			<th scope="col">Price</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
			{% for discount in discounts %}
				<tr>
					<th scope="row">{{loop.index}}</th>				
					<td>{{discount.money}}$</td>
					<td>{{discount.discount}}</td>
					
					<td>
						<a href="/admin/discount_delete/{{discount.id}}" class="btn-sm btn-danger">Delete</a>
						<a href="/admin/discount_edit/{{discount.id}}" class="btn-sm btn-primary">Edit</a>
					</td>
				</tr>
			{% endfor %}
		</tbody>
	</table>
</div>