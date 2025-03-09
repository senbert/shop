
<div class="container">
	<h1 class="text-center">Contacts</h1>
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Subject</th>
			<th scope="col">Messages</th>
			<th scope="col">Status</th>
			<th scope="col">Action</th>
		</tr>
		</thead>
		<tbody>
			{% for contact in contacts %}
				<tr>
					<th scope="row">{{loop.index}}</th>
					<td>
						<a href="/admin/product/{{product.id}}">{{contact.name}}</a>
					</td>
					<td>{{contact.email}}</td>
					<td>{{contact.subject}}</td>
					<td>{{contact.message}}</td>
					<td>{% if contact.status == 0  %}
						<span class="btn-sm btn-primary">Не прочитано</span>
						{% else  %}
						<span style="color:green;">Прочитано</span>
						{%  endif %}
					</td>
					<td>
						<a href="/contact/status/{{contact.id}}" class="btn-sm btn-primary">Status</a>
					</td>
				</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
