<!-- shopping-cart-area start -->
<div class="cart-main-area pt-95 pb-100">
    <div class="container">
        <h3 class="page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="cart/update" method="post">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for product in cart.products %}
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="/product/{{product.id}}">
                                            {% if product.image %}
                                            <img src="/assets/img/product/min/{{product.image.file_name}}" alt="">
                                            {% else %}
                                            <img height="100px" src="/assets/img/product/min/not-img.jpg" alt="">
                                            {% endif %}
                                        </a>
                                    </td>
                                    <td class="product-name"><a href="#">{{product.name}}</a></td>
                                    <td class="product-price-cart"><span class="amount">${{product.price}}</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="{{product.id}}" value="{{product.qty}}">
                                        </div>
                                    </td>
                                    <td class="product-subtotal">${{product.countPrice}}</td>
                                    <td class="product-remove"><a href="/cart/delete/{{product.id}}"><i class="ti-trash"></i></a></td>
                                </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                   
                                    <a href="#">Continue Shopping</a>
                                    <button type="submit">Update Shopping Cart</button>
                                   
                                </div>
                             
                                <div class="cart-clear">
                                    <a href="/cart/clear">Clear Shopping Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="cart-tax">
                            <h4 class="cart-bottom-title">Estimate Shipping And Tax</h4>
                            <div class="tax-wrapper">
                                <p>Enter your destination to get a shipping estimate.</p>
                                    <form action="cart/shiping" method="post">
                                        <div class="tax-select-wrapper">
                                            <div class="tax-select">
                                                <label>
                                                    Country
                                                </label>
                                                <select class="email s-email s-wid" id="country">
                                                    <option value="">Не выбрано</option>
                                                  
                                                    {% for country in countris %}
                                                        <option value="{{country.id}}" {{country.id == cart.country_id ? "selected"}}>
                                                            {{country.name}}
                                                        </option>
                                                    {% endfor %}
                                                </select>
                                            
                                            </div>
                                            <div class="tax-select">
                                                <label>
                                                    State/Province
                                                </label>
                                               
                                                <select class="email s-email s-wid" name="state_id" id="states">
                                                     {% if states %}
                                                    <option value="">Не выбрано</option>
                                                    {% for state in states %}
                                                        <option value="{{state.id}}" {{state.id == cart.state_id ? "selected"}}>{{state.name}}</option>
                                                    {% endfor %}
                                                    {% endif %}
                                                </select>
                                               
                                            </div>
                                            <div class="tax-select">
                                                <label>
                                                    Zip/Postal Code
                                                </label>
                                                <input type="text" placeholder="1234567">
                                            </div>
                                            <button class="cart-btn-2" type="submit">Get A Quote</button>
                                        </div>
                                    </form>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="discount-code-wrapper">
                            <h4 class="cart-bottom-title">DISCOUNT CODES</h4>
                            <div class="discount-code">
                                <p>Enter your coupon code if you have one.</p>
                                <form action="cart/discount" method="post">
                                    <input type="text" required="" name="discount">
                                    <button class="cart-btn-2" type="submit">Get A Quote</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="grand-totall">
                            <span>Subtotal:   ${{cart.subTotal}}</span>
                            {% if cart.grant_tottal %}
                            <h5>Grand Total:   ${{cart.grant_tottal}}</h5>
                            {% endif %}
                            <a href="#">Proceed To Checkout</a>
                            <p>Checkout with Multiple Addresses</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // let countrys = document.querySelector('#country');
    // countrys.onchange = getStstsCountry;
    // function getStstsCountry() {
    //     let country_id = countrys.value;
    //     location.href = '/cart/country?country_id=' + country_id; 
    // }

</script>