 <form action="/product/add_comment" method="post">
<div class="star-box">
    <h2>Rating:</h2>
    <div class="product-rating">
        <i class="ti-star theme-color"></i>
        <i class="ti-star theme-color"></i>
        <i class="ti-star theme-color"></i>
        <i class="ti-star"></i>
        <i class="ti-star"></i>
        <span>(3)</span>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="rating-form-style mb-20">
    <input name="name" placeholder="Name" type="text">
        </div>
    </div>
    <div class="col-md-6">
        <div class="rating-form-style mb-20">
            <input name="email" placeholder="Email" type="text">
        </div>
    </div>
    <div class="col-md-12">
    <div class="rating-form-style form-submit">
        <textarea name="message" placeholder="Message"></textarea>
        <input type="hidden" name="prod_id" value="{{product.id}}">
        <input type="submit" value="add review">
        
    </div>
    <div>
</div>
                                 
</form>