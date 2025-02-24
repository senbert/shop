 <div class="shop-sidebar">
                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Search Products</h4>
                        <div class="shop-search mt-25 mb-50">
                            <form class="shop-search-form">
                                <input type="text" placeholder="Find a product">
                                <button type="submit">
                                    <i class="icon-magnifier"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Filter By Price</h4>
                            <div class="price_filter mt-25">
                            <div id="slider-range"></div>
                                <form action="/price/filter" method="post">
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            
                                            <label>price : </label>
                                            <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                            <input type="hidden" id="min_price" name="min_price"/>
                                            <input type="hidden" id="max_price" name="max_price"/>
                                        </div>
                                        <button type="submit">Filter</button> 
                                    </div>
                                </form>
                        </div>
                    </div>
                    <div class="shop-widget mt-50">
                        
                        <h4 class="shop-sidebar-title">{{category.parent.name}}</h4>
                            <div class="shop-list-style mt-20">
                            <ul>
                                {%  for cat in category.parent.childrenSub %}
                                {% if cat.id == category.id %}
                                <li><a style="color:red" href="/category/{{cat.id}}">{{cat.name}}</a></li>
                                {% else %}
                                <li><a href="/category/{{cat.id}}">{{cat.name}}</a></li>
                                {% endif %}
                                {% endfor %}
                            </ul>
                        </div>


                        
                    </div>
                    <div class="shop-widget mt-50">
                        <h4 class="shop-sidebar-title">Top Brands </h4>
                            <div class="shop-list-style mt-20">
                            <ul>
                                <li><a href="#">Authority</a></li>
                                <li><a href="#">AvoDerm Natural</a></li>
                                <li><a href="#">Bil-Jac</a></li>
                                <li><a href="#">Blue Buffalo</a></li>
                                <li><a href="#">Castor & Pollux</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-50">
                        <h4 class="shop-sidebar-title">Health Consideration </h4>
                            <div class="shop-list-style mt-20">
                            <ul>
                                <li><a href="#">Bone Development <span>18</span></a></li>
                                <li><a href="#">Digestive Care <span>22</span></a></li>
                                <li><a href="#">General Health <span>19</span></a></li>
                                <li><a href="#">Hip & Joint  <span>41</span></a></li>
                                <li><a href="#">Immune System  <span>22</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-50">
                        <h4 class="shop-sidebar-title">Nutritional Option </h4>
                            <div class="shop-list-style mt-20">
                            <ul>
                                <li><a href="#">Grain Free  <span>18</span></a></li>
                                <li><a href="#">Natural <span>22</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>