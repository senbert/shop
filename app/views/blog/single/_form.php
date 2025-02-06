<form action="/article/add_comment" method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="leave-form">
                <input name="name" type="text" placeholder="Full Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="leave-form">
                <input name="email" type="email" placeholder="Eail Address ">
            </div>
        </div>
        <div class="col-md-12">
            <div class="text-leave">
                <textarea placeholder="Massage" name="message"></textarea>
                <input type="hidden" name="article_id" value="{{article.id}}">
                <input type="submit" value="SEND MASSAGE">
                
            </div>
        </div>
    </div>
</form>