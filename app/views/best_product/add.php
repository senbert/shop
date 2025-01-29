<div class="container">
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/admin/add_best_product' method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="data">Data</label>
					<input name="date" type="date" class="form-control">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" class="form-control" id="description" rows="3"></textarea>
				</div>
                <input name="prod_id" type="hidden" value="{{prod_id}}">
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>