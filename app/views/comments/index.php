
<div class="container">
	<h1 class="text-center">Comments</h1>
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Date</th>
			<th scope="col">Email</th>
			<th scope="col">Message</th>
			<th scope="col">Img</th>
            <th scope="col">Action</th>

		</tr>
		</thead>
		<tbody>
			{% for comment in comments %}
				<tr>
					<th scope="row">{{loop.index}}</th>
					<td>{{comment.name}}</td>
					<td>{{comment.date}}</td>
					<td>{{comment.email}}</td>
					<td>{{comment.message}}</td>
                    {% if comment.img %}
                    <td><img src="/assets/img/blog/{{comment.img}}"></td>
                    {% else %}
                    <td><img src="/assets/img/blog/blog-comment1.png"></td>
                    {% endif %} 
					<td>
						<a href="/admin/comments_delete/{{comment.id}}" class="btn-sm btn-danger">Delete</a>
					</td>
				</tr>
			{% endfor %}
		</tbody>
	</table>
</div>