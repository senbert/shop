<div class="container">
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/admin/edit_create' method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Name</label>
					<input name="name" type="text" class="form-control" value="{{product.name}}">
					<label for="price">Price</label>
					<input name="price" type="text" class="form-control" value="{{product.price}}">
					<label for="price_old">Old price</label>
					<input name="price_old" type="text" class="form-control" value="{{product.price_old}}">
					<div class="form-group">
						<label>Brand</label>
							<select name="brand_id" id="brand_id">
								<option value="">Not select</option> 
								{% for brand in brands %}
								{% if brand.id == product.brand_id %}
								<option value="{{brand.id}}" selected>{{brand.name}}</option>
								{% else %}
								<option value="{{brand.id}}">{{brand.name}}</option>
								{% endif %}
								
								{% endfor %}
							</select>
					</div>
					<div class="form-group">
						<label>Category</label>
						<select name="cat_id" id="cat_id">
							<option value="">Not select</option> 
							{% for cat in categories %}
							{% if cat.id == product.cat_id %}
							<option value="{{cat.id}}" selected>{{cat.name}}</option>
							{% else %}
							<option value="{{cat.id}}">{{cat.name}}</option>
							{% endif %}
							{% endfor %}
						</select>
					</div>
				</div>
				<input type="hidden" name="id" value="{{product.id}}">
                
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>