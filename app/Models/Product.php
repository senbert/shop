<?php

namespace App\Models;


class Product extends Model
{

    const POPULAR = 1;
    const NOT_POPULAR = 0;
    
    const CAT_ID = 1;

    
    
    public static function getTable()
    {
        return 'products';
    } 

    public static function add($data)
    {
        $add = self::table()->create($data);
        $add->set($data);
        return $add->save();
    }

    public static function delete($id)
    {
        $delete =  self::table()->find_one($id);
        $delete->delete();
    }

    public static function validate($data)
    {
        $v = new \Valitron\Validator($data);
        $v->rule('required', ['name', 'price'])->message('empty_data_product_{field}');
        // $v->rule('lengthMin', ['name','price'], 4)->message('min_string_product_{field}');
        $v->labels(['name' => 'name', 'price' => 'price']);
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }

    public static function getPopular()
    {
        $products = self::table()->where('popular', self::POPULAR)->findMany();
       if ($products) {
            foreach ($products as $product) {
                $product->images = ProductImg::table()->where('prod_id', $product->id)->findMany();
            }  
       }
       return $products;
    }

    public static function getAllImg()
    {
        $products = self::findAll();
        foreach ($products as $product) {
            $product->img = ProductImg::table()->where('prod_id', $product->id)->find_one();
        }
        return $products;
    }

    public static function countRating($comments)
    {

        if(!$comments){
            return 0;
        }
        $countComments = count($comments);
        $totalRating = 0;
        foreach ($comments as $comment) {
            $totalRating += $comment->likes; 
        }

        return ceil($totalRating / $countComments);


    }


    




}