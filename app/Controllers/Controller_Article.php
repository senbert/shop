<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;


class Controller_Article extends Controller_Base
{
    public function action_index()
    {
        $articles = Article::findAll();
        $this->render('article/index', ['articles' => $articles]);
        


    }


}