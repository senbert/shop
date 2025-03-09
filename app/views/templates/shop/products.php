<div class="grid-list-product-wrapper">
    <div class="product-view product-grid">
        <div class="row">
           {% for product in products %}
            <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                <div class="product-wrapper mb-10">
                    <div class="product-img">
                        <a href="/product/{{product.id}}">
                            {% if product.img %}
                            <img src="/assets/img/product/card/{{product.img.file_name}}" alt="">
                            {% else %}
                            <img src="/assets/img/product/card/not-img.jpg" alt="">
                            {% endif %}
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
                        <h4><a href="/product/{{product.id}}">{{product.name}}</a></h4>
                        <div class="product-price">
                            <span class="new">${{product.price}} </span>
                            {% if product.price_old %}        
                                <span class="old">${{product.price_old}}</span>
                            {% endif %}
                        </div>
                    </div>
                    <div class="product-list-content">
                        <h4><a href="#">{{product.name}}</a></h4>
                        <div class="product-price">
                            <span class="new">${{product.price}}</span>
                        </div>
                        <p>{{product.description}}</p>
                        <div class="product-list-action">
                            <div class="product-list-action-left">
                                <a class="addtocart-btn" title="Add to cart" href="/cart/add/"><i class="ion-bag"></i> Add to cart</a>
                            </div>
                            <div class="product-list-action-right">
                                <a title="Wishlist" href="#"><i class="ti-heart"></i></a>
                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {% endfor %}    
        </div>
        {% if paginator %}
        {% include 'templates/shop/pagination.php' %}
        {% endif %}

    </div>
</div>