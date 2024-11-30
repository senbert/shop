<?php

namespace App\core;

class View
{
    public static function render($layout, $data)
    {
    //    dd($data);
        $loader = new \Twig\Loader\FilesystemLoader('app/views');
        $twig = new \Twig\Environment($loader);
        $layoutPath = 'layouts/' . $layout . '.php';
//        dd($layoutPath);
        echo $twig->render($layoutPath, $data);
    }
}