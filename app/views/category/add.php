<div class="container">
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/admin/add_category' method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Name</label>
					<input name="name" type="text" class="form-control">
				</div>
                <div class="form-group">
					<label>Category</label>
					<select name="parent_id" id="">
						<option value="">Not select</option> 
						{% for cat in categories %}
						<option value="{{cat.id}}">{{cat.name}}</option>
						{% endfor %}
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>