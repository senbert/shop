<div class="product-details-img">
    <img id="zoompro" src="/assets/img/product/big/{{product.images[0].file_name}}" data-zoom-image="/assets/img/product/original/{{product.images[0].file_name}}" alt="zoom"/>
    
    <div id="gallery" class="mt-12 product-dec-slider owl-carousel">
        {% for img in product.images %}
        <a data-image="/assets/img/product/big/{{img.file_name}}" data-zoom-image="/assets/img/product/original/{{img.file_name}}">
            <img src="/assets/img/product/min/{{img.file_name}}" alt="">
        </a>
        {% endfor %}
        
    </div>
</div>