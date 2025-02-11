<!-- description -->
<div class="description-review-area pb-100">
    <div class="container">
        <div class="description-review-wrapper gray-bg pt-40">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">DESCRIPTION</a>
                <a data-toggle="tab" href="#des-details2">MORE INFORMATION</a>
                <a data-toggle="tab" href="#des-details3">REVIEWS (2)</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        {{product.description|raw}}
                    </div>
                </div>
                <div id="des-details2" class="tab-pane">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            <li><span>name:</span> Scanpan Classic Covered</li>
                            <li><span>color:</span> orange , pink , yellow </li>
                            <li><span>size:</span> xl, l , m , sl</li>
                            <li><span>length:</span> 102cm, 110cm , 115cm </li>
                            <li><span>Brand:</span> Nike, Religion, Diesel, Monki </li>
                        </ul>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="rattings-wrapper">
                        {% for comment in comments %}
                        <div class="sin-rattings">
                            <div class="star-author-all">    
                                <div class="product-rating f-left">
                                    <i class="ti-star theme-color"></i>
                                    <i class="ti-star theme-color"></i>
                                    <i class="ti-star theme-color"></i>
                                    <i class="ti-star theme-color"></i>
                                    <i class="ti-star theme-color"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="ratting-author f-right">
                                    <h3>{{comment.name}}</h3>
                                    <span>{{comment.date}}</span>
                                </div>
                            </div>
                            <p>{{comment.message}}</p>

                        </div>
                        {% endfor %}
                    <div class="ratting-form-wrapper">
                        <h3>Add your Comments :</h3>
                        <div class="ratting-form">
                           
                            <!-- form -->
                             {% include 'main/product/_add.php' %}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>