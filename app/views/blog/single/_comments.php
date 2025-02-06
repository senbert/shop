<div class="blog-comment-wrapper mt-55">
    <h4 class="blog-dec-title">comments : {{article.countMessages}}</h4>
    {% for message in article.messages %}
    <div class="single-comment-wrapper mt-35 {%  if loop.index is even %}ml-125{% endif %} ">
        
        <div class="blog-comment-img">
            {% if message.avatar %}
                    <td><img src="/assets/img/avatars/{{message.avatar}}"></td>
                    {% else %}
                    <td><img src="/assets/img/avatars/not_user.png"></td>
            {% endif %}
        </div>
        
        <div class="blog-comment-content">
            
            <h4>{{message.name}}</h4>
            <span>{{message.date}}</span>
            <p>{{message.message}} </p>
            
        </div>
    </div>
    {% endfor %}
</div>