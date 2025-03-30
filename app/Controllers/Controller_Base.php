<?php

namespace App\Controllers;
use App\Models\Category;
use App\Helpers\Message;

class Controller_Base
{
 
    public function back() 
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function redirect($url)
    {
        header('location: /' . $url);
        exit();
    }

    protected function addMessage($result, $key)
    {
        $type = $result ? 'success' : 'error';
        Message::add($type, $key);
        return $this;
    }

    public function home()
    {
        header('location: /');
        exit();
    }


}