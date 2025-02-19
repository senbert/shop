
<div class="container">
	<h1 class="text-center">Search</h1>

	
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			
		</tr>
		</thead>
		<tbody>
			{% for product in products %}
				<tr>
					<th scope="row">{{loop.index}}</th>
					<td>
						<a href="/admin/product/{{product.id}}">{{product.name}}</a>
					</td>
					
				</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
