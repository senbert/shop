 {% include 'templates/breadcrumbs.php' %}

        <!-- shop -->
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 col-md-8">
                <div class="blog-details-wrapper res-mrg-top">
                    <div class="single-blog-wrapper">
                        <div class="blog-img mb-30">
                            <img src="/assets/img/blog/{{article.img}}.jpg" alt="">
                        </div>
                        <div class="blog-details-content">
                            <h2>{{article.title}}</h2>
                            <div class="blog-meta">
                                <ul>
                                    <li>{{article.date}} </li>
                                    <li>
                                        <a href="#"> {{article.countMessages}} Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p>{{article.content}}</p>

                        <div class="blog-dec-tags-social">
                            <div class="blog-dec-tags">
                                <ul>
                                {% for tag in article.tags %}
                                    <li><a href="/blog/{{tag.name}}">{{tag.name}}</a></li>
                                    {% endfor %}   
                                    
                                </ul>
                            </div>
                            <div class="blog-dec-social">
                                <span>share :</span>
                                <ul>
                                    <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                                    <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                                    <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                        {% include 'blog/single/_comments.php' %}

                    <div class="blog-reply-wrapper mt-50">
                        <h4 class="blog-dec-title">post a comment</h4>

                        {% include 'blog/single/_form.php' %}

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">

                {% include 'blog/single/_shop_sidebar.php' %}

            </div>
        </div>
    </div>
</div>
