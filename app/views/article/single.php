<div class="container mt-3">
    <h1 class="text-center">Blog</h1>

    <!-- content -->
    <div class="tab-content mt-3">
        <!-- info -->
        <div class="tab-pane fade show active" id="info">
            <a href="#" class="btn btn-primary mb-3" role="button">Edit product</a>

            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Title</th>
                        <th scope="col">Data</th>
                        <th scope="col">Preview</th>
                        <th scope="col">Img</th>
                        <th scope="col">Content</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>Autor</th>
                        <td>{{article.autor}}</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th>Title</th>
                        <td>{{article.title}}</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <th>Data</th>
                        <td>{{article.data}}</td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <th>Preview</th>
                        <td>{{article.preview}}$</td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <th>Img</th>
                        <td>
                        <img src="/assets/img/blog/{{article.img}}">
                        </td>
                    </tr>
                    
                    <tr>
                        <th>6</th>
                        <th>Content</th>
                        <td>{{article.content | raw}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

