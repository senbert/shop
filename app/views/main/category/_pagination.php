<div class="pagination-style text-center mt-10">
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