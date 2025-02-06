<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\ArticleMessage;
use App\Models\Category;
use App\Helpers\File;
use Intervention\Image\ImageManager;


class Controller_Comment extends Controller_Admin
{
    public function action_index()
    {
        $comments = ArticleMessage::findAll();

        $this->render('comments/index', ['comments' => $comments]);
    }

    public function action_delete($id)
    {
        $delete = ArticleMessage::findOne($id)->delete();
        $this->addMessage(true, 'delete_comm_product')->back();
        
    }

}