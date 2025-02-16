<div class="product-details-content">
    <h2>{{product.name}}</h2>
    <div class="product-rating">
        {% for i in 1..5 %}
        {% if i <= product.rating %}
        <i class="ti-star theme-color"></i>
        {% else %}
        <i class="ti-star"></i>
        {% endif %}
        {% endfor %}
        <span> ( {{count}} Customer Review )</span>
    </div>
    <div class="product-price">
        <span class="new">${{product.price}} </span>
        {% if product.price_old %}
        <span class="old">${{product.price_old}}</span>
        {% endif %}
    </div>
    <div class="in-stock">
        <span><i class="ion-android-checkbox-outline"></i> In Stock</span>
    </div>
    <div class="sku">
        <span>SKU#: MS04</span>
    </div>
    <p>{{product.preview}}</p>
    <div class="product-details-style shorting-style mt-30">
        <label>color:</label>
        <select>
            <option value=""> Choose an option</option>
            <option value=""> orange</option>
            <option value=""> pink</option>
            <option value=""> yellow</option>
        </select>
    </div>
    <div class="quality-wrapper mt-30 product-quantity">
        <label>Qty:</label>
        <div class="cart-plus-minus">
            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
        </div>
    </div>
    <div class="product-list-action">
        <div class="product-list-action-left">
            <a class="addtocart-btn" href="#" title="Add to cart">
                <i class="ion-bag"></i>
                Add to cart
            </a>
        </div>
        <div class="product-list-action-right">
            <a href="#" title="Wishlist">
                <i class="ti-heart"></i>
            </a>
        </div>
    </div>
    <div class="social-icon mt-30">
        <ul>
            <li><a href="#"><i class="icon-social-twitter"></i></a></li>
            <li><a href="#"><i class="icon-social-instagram"></i></a></li>
            <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
            <li><a href="#"><i class="icon-social-skype"></i></a></li>
            <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
        </ul>
    </div>
</div>
