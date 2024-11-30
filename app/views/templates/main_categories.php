<!-- main categories -->
<div class="food-category food-category-col pt-100 pb-60">
    <div class="container">  
        <div class="row">
        {% for category in categories %}
            <div class="col-lg-4 col-md-4">
                <div class="single-food-category cate-padding-1 text-center mb-30">
                    <div class="single-food-hover-2">
                        <img src="/assets/img/category/{{category.img}}" alt="">
                    </div>
                    <div class="single-food-content">
                        <h3>{{category.name}}</h3>
                    </div>
                </div>
            </div>
        {% endfor %}        

        </div>
             
    </div>
</div>
          