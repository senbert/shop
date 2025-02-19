{% include 'templates/breadcrumbs.php' %}

<!-- shop -->
<div class="shop-area pt-100 pb-100 gray-bg">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                
            {% include 'main/category/_topbar.php' %} 

            {% include 'main/category/_list_product.php' %}

            </div>
            <div class="col-lg-3">

            {% include 'main/category/_sidebar.php' %}

            </div>
        </div>
    </div>
</div>
