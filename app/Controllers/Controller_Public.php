<?php

namespace App\Controllers;
use App\Models\Category;
use App\Helpers\Message;

class Controller_Public extends Controller_Base
{
    public $layout = 'main';    
    public $namePage = '';

    public function render($template, $data = null)
    {

        $data['content'] = $template;
       
        $data['categories'] = Category::getCategoriesTree();
        $data['name_page'] = $this->namePage;
        $data['message'] = Message::display();
//        dd($data);
        \App\Core\View::render($this->layout, $data);
//        dd($tamplate);
    }


}