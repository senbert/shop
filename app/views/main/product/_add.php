 <form action="/product/add_comment" method="post">
    <div class="star-box">
        <h2>Rating:</h2>
        <div class="product-rating" id="rating-form">
            <i class="ti-star theme-color"></i>
            <i class="ti-star theme-color"></i>
            <i class="ti-star theme-color"></i>
            <i class="ti-star"></i>
            <i class="ti-star"></i>
            <span>(3)</span>
        </div>
        <input type="hidden" name="likes" id="rating">
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

<script>
let stars = document.querySelectorAll('#rating-form .ti-star');
console.log(stars[0]);

stars.forEach(star => star.onclick = setRating);

function setRating()
{
    stars.forEach(star => star.classList.remove('theme-color'));
    stars = [...stars];
    let index = stars.indexOf(this);
    for (let i = 0; i < stars.length; i++) {
       if (i <= index) {
            stars[i].classList.add('theme-color')
       }    
    }
    document.querySelector('#rating').value = index + 1;
    document.querySelector('#rating-form span').innerText = '(' + (index + 1) + ')'




    
}

let test = $('#rating-form .ti-star')
console.log(test);

</script>