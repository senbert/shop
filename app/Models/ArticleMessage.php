<?php

namespace App\Models;


class ArticleMessage extends Model
{
    public static function getTable()
    {
        return 'article_coments';
    }

    public static function count($messages)
    { 
        $count = count($messages);
        if ($count === 0) {
            return 0;
        } elseif ($count < 10) {
            return '0' . $count;
        } else {
            return $count;
        }
    }

    public static function getMessages($article_id)
    {
      $messages = ArticleMessage::table()->where('article_id', $article_id)->findMany();
      if ($messages) {
        foreach ($messages as $message) {
            $user = User::table()->where('email', $message->email)->findOne();
            $message->avatar = $user ? $user->avatar : null;
        }
      }
      return $messages;
    }

}