<div class="container">
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/admin/add_discount' method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Money</label>
					<input name="money" type="text" class="form-control">
				</div>
                <div class="form-group">
					<label for="name">Discount</label>
					<input name="discount" type="text" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>