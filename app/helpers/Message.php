<?php

namespace App\helpers;


class Message
{

    public static function add($type, $key) 
    {
        $_SESSION['mess']['type'] = $type;
        $_SESSION['mess']['key'] = $key;
    }

    public static function display()
    {
        // dump($_SESSION);
        // выходим если нет сообщения
        if (empty($_SESSION['mess'])) return;
        // получаем текст сообщения
        $type = $_SESSION['mess']['type'];
        $text = self::getText($type);
        // удаляем сессию
        unset($_SESSION['mess']);
        // выводим текст на экран
        if ($type == 'success') return "<div class='alert alert-success mt-3'>$text</div>";
        else return "<div class='alert alert-danger mt-3'>$text</div>"; 
        
    }

    private static function getText($type)
    {
        // получаем массив сообщений из файла
        $messages = include 'messages.php';
        // возвращаем текст сообщения из массива по ключу
        $key = $_SESSION['mess']['key'];
        return $messages[$type][$key];
    }
    
}