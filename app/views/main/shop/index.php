{% include 'templates/breadcrumbs.php' %}

<!-- shop -->
<div class="shop-area pt-100 pb-100 gray-bg">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                
            {% include 'main/shop/_topbar.php' %} 

            {% include 'main/shop/_list_product.php' %}

            </div>
            <div class="col-lg-3">

            {% include 'main/shop/_sidebar.php' %}

            </div>
        </div>
    </div>
</div>
