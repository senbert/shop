<?php

namespace App\Controllers;
use App\Helpers\Message;

class Controller_Admin extends Controller_Base
{
    public $layout = 'admin';    

    public function render($template, $data = null)
    {
        $data['content'] = $template;
        $data['message'] = Message::display();

        \App\Core\View::render($this->layout, $data);
    }

}