<!-- deal-area -->
<div class="deal-area bg-img pt-95 pb-100">
    <div class="container">
        <div class="section-title text-center mb-50">
            <h4>Best Product</h4>
            <h2>Deal of the Week</h2>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="deal-img wow fadeInLeft">
                    <a href="#"><img src="/assets/img/product/card/{{best_product.img.file_name}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="deal-content">
                    <h3><a href="#">{{best_product.data.name}}</a></h3>
                    <div class="deal-pro-price">
                        <span class="deal-old-price">${{best_product.data.price}} </span>
                        <span> $10.00</span>
                    </div>
                    <p>{{best_product.description}}</p>
                    <div class="timer timer-style">
                        <div data-countdown="2025/05/05"></div>
                    </div>
                    <div class="discount-btn mt-35">
                        <a class="btn-style" href="#">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>