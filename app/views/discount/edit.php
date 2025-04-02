<div class="container">
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/admin/discount_edit' method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Money</label>
					<input name="money" type="text" class="form-control" value="">
				</div>
                <div class="form-group">
					<label for="name">Discount</label>
					<input name="discount" type="text" class="form-control" value="">
				</div>
				<input type="hidden" name="id" value="{{discount.id}}">

				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>