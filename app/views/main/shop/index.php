{% include 'templates/breadcrumbs.php' %}

<!-- shop -->
<div class="shop-area pt-100 pb-100 gray-bg">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                
            {% include 'templates/shop/topbar.php' %} 

            {% include 'templates/shop/products.php' %}

            </div>
            <div class="col-lg-3">

            {% include 'templates/shop/sidebar.php' %}

            </div>
        </div>
    </div>
</div>
