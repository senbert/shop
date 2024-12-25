<div class="container">
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/article/add' method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Autor</label>
					<input name="autor" type="text" class="form-control">
				</div>
				<div class="form-group">
					<label for="description">Title</label>
                    <input name="title" type="text" class="form-control">
					<!-- <textarea name="title" class="form-control" id="title" rows="3"></textarea> -->
				</div>
                <div class="form-group">
					<label>Data</label>
					<input name="data" type="number" class="form-control" id="data">
				</div>
                <div class="form-group">
					<label>Preview</label>
					<input name="preview" type="text" class="form-control" id="data">
				</div>
                <div class="form-group">
					<label>Content</label>
                    <textarea name="content" class="form-control" id="content" rows="3"></textarea>
				</div>
                <div class="form-group">
					<label>Img</label>
					<input name="img" type="file" class="form-control">
				</div>
				
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('content', {
// Подключаем плагин для загрузки изображений на сервер
extraPlugins: 'uploadimage',
// Указываем путь к файлу на сервере для загрузки
filebrowserUploadUrl: '/upload/file',
// Метод отправки данных для загрузки (используем form-data)
filebrowserUploadMethod: 'form'
});
</script>