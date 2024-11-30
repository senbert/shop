<!-- blog -->
<div class="blog-area pb-70">
    <div class="container">
        <div class="section-title text-center mb-60">
            <h4>Latest News</h4>
            <h2>From Our Blog</h2>
        </div>
        <div class="row">
            {% for article in articles %}
            <div class="col-lg-4 col-md-6">
                <div class="blog-wrapper mb-30 gray-bg">
                    <div class="blog-img hover-effect">
                        <a href="blog-details.html"><img alt="" src="../assets/img/blog/{{article.img}}"></a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li>By: <span>{{article.autor}}</span></li>
                                <li>Sep 14, 2018</li>
                            </ul>
                        </div>
                        <h4><a href="blog-details.html">{{article.title}}</a></h4>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
    </div>
</div>