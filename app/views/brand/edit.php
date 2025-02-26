<div class="container">
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/brand/edit_create' method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Name</label>
					<input name="name" type="text" class="form-control" value="{{brand.name}}">
				</div>
				<input type="hidden" name="id" value="{{brand.id}}">
                
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>