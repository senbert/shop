<?php

namespace App\Models;


class FoodComment extends Model
{

    public static function getTable()
    {
        return 'food_comments';
    }

    public static function countComment()
    {
       $number_of_people = self::table()->sum('likes')->count();
       dd($number_of_people);
    }

}