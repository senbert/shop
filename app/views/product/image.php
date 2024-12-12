<div class="tab-pane fade" id="images">
        <h2 class="text-center">Images Product</h2>
        <a href="product_img/add" class="btn btn-primary mb-3" role="button">Add Image</a>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>
                    <img src="/assets/img/product/card/{{image.file_name}}.jpg">
                </td>
                <td>
                    <a href="#" class="btn-sm btn-danger">Delete</a>
                </td>
            </tr>

            </tbody>
        </table>
</div>