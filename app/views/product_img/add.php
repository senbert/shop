<div class="container">
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/product_img/add' method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Img</label>
					<input name="img" type="file" class="form-control">
				</div>
				<input name="prod_id" type="hidden" value="{{prod_id}}">
				<button type="submit" class="btn btn-primary">Add</button>
				
			</form>
		</div>
	</div>
</div>