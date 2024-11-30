<!-- product-area -->
<div class="product-area pt-95 pb-70 gray-bg">
    <div class="container">
        <div class="section-title text-center mb-55">
            <h4>Most Populer</h4>
            <h2>Recent Products</h2>
        </div>
        <div class="row">
            {% for product in products %}
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="product-wrapper mb-10">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img src="/assets/img/product/card/{{product.images[0].file_name}}" alt="">
                        </a>
                        <div class="product-action">
                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                <i class="ti-plus"></i>
                            </a>
                            <a title="Add To Cart" href="#">
                                <i class="ti-shopping-cart"></i>
                            </a>
                        </div>
                        <div class="product-action-wishlist">
                            <a title="Wishlist" href="#">
                                <i class="ti-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="product-details.html">{{product.name}}</a></h4>
                        <div class="product-price">
                            <span class="new">${{product.price}}</span>
                            <span class="old">${{product.price_old}}</span>
                        </div>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
    </div>
</div>