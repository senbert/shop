        <!-- breadcrumbs -->
        <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url(../assets/img/banner/banner-2.jpg);">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>Blog</h2>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- blog -->
        <div class="blog-area pt-100 pb-100 clearfix">
            <div class="container">
                
                <div class="row">
                    {% for article in articles %}
                    <div class="col-lg-6 col-md-6">
                        <div class="blog-wrapper mb-30 gray-bg">
                            <div class="blog-img hover-effect">
                                <a href="/blog/single/{{article.id}}"><img alt="" src="/assets/img/blog/{{article.img}}"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li>By: <span>{{article.autor}}</span></li>
                                        <li>Sep 14, 2018</li>
                                    </ul>
                                </div>
                                <h4><a href="/blog/single/{{article.id}}">{{article.title}}</a></h4>
                            </div>
                        </div>
                    </div>
                    {% endfor %}
                    </div>
                </div>
                <div class="pagination-style text-center mt-20">
                    <ul>
                        <li>
                            <a href="{{paginator.getPrevUrl()}}"><i class="icon-arrow-left"></i></a>
                        </li>
                        {% for page in paginator.getPages()%}
                        <li>
                            <a class="{{page.isCurrent ? 'active'}}" href="{{page.url}}">{{page.num}}</a>
                        </li>
                      {% endfor %}
                        <li>
                            <a href="{{paginator.getNextUrl()}}"><i class="icon-arrow-right"></i></a>
                        </li>
                    </ul>
                     
                </div>
            </div>
        </div>
       
		