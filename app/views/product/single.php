<div class="container mt-3">
    <h1 class="text-center">{{product.name}}</h1>
    <!-- nav -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#info">Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#images">Images</a>
        </li>
    </ul>
    
    <!-- content -->
    <div class="tab-content mt-3">
        <!-- info -->
        <div class="tab-pane fade show active" id="info">
            <h2 class="text-center">Info</h2>
            <a href="#" class="btn btn-primary mb-3" role="button">Edit product</a>

            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>Name</th>
                        <td>{{product.name}}</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <th>Category</th>
                        <td>{{product.category.name}}</td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <th>Price</th>
                        <td>{{product.price}}$</td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <th>Old Price</th>
                        <td>{{ product.price_old ? product.price_old ~ '$' }}</td>
                    </tr>
                    <tr>
                        <th>6</th>
                        <th>Description</th>
                        <td>{{product.description | raw}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Images -->
        <div class="tab-pane fade" id="images">
            <h2 class="text-center">Images Product</h2>
            <a href="/product_img/add/{{product.id}}" class="btn btn-primary mb-3" role="button">Add Image</a>

            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                {% for image in images %}
                <tr>
                    <th scope="row">{{loop.index}}</th>
                    <td>
						<img src="/assets/img/product/min/{{image.file_name}}">
					</td>
                    <td>
                        <a href="#" class="btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>

