
<div class="container">
	<h1 class="text-center">Blog</h1>
	
	<a href="/article/add" class="btn btn-primary mb-3" role="button">Add new blog</a>
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Autor</th>
			<th scope="col">Title</th>
			<th scope="col">Data</th>
			<th scope="col">Preview</th>
			<th scope="col">Img</th>
            <th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
			{% for article in articles %}
				<tr>    
					<th scope="row">{{loop.index}}</th>
                    <td>{{article.autor}}</td>
					<td>
						<a href="/article/single/{{article.id}}">{{article.title}}</a>
					</td>
					<td>{{article.data}}</td>
					<td>{{article.preview}}</td>
					<td><img height="100px" src="/assets/img/blog/{{article.img}}"></td>
                    <td>
						<a href="/article/delete/{{article.id}}" class="btn-sm btn-danger">Delete</a>
						<a href="/article/edit/{{article.id}}" class="btn-sm btn-primary">Edit</a>
					</td>
				</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
