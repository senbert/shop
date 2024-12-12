
<div class="container">
	<h1 class="text-center">Categories</h1>
	
	<a href="/admin/add_category" class="btn btn-primary mb-3" role="button">Add categorie</a>
			
	<div class="form-group">
		<select class="form-select" id="main_cat" aria-label="Default select example">
			<option selected>Не выбрано</option>
			{% for main_cat  in  main_cats %}
				<option value="{{main_cat.id}}" {{cat_id == main_cat.id ? "selected"}}>{{main_cat.name}}</option>
			{% endfor %}
			
		</select>
	</div>

	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Parent</th>
            <th scope="col">Action</th>
		</tr>
		</thead>
		<tbody>
			{% for category in categories %}
				<tr>
					<th scope="row">{{loop.index}}</th>
					<td>
						<a href="/admin/single/{{category.id}}">{{category.name}}</a>
					</td>
					<th scope="row">{{category.parent.name}}</th>
					<td>
						<a href="/cat/delete/{{category.id}}" class="btn-sm btn-danger">Delete</a>
						<a href="/cat/edit/{{category.id}}" class="btn-sm btn-primary">Edit</a>
					</td>
				</tr>
			{% endfor %}
		</tbody>
	</table>
</div>

<script>
	let main_cat = document.querySelector('#main_cat')
	main_cat.addEventListener('change', function(){
		let cat_id = main_cat.value
		if(cat_id){
			location.href = '/admin/categories/' + cat_id
		} else {
			location.href = '/admin/categories'
		}
	})
</script>