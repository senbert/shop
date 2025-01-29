<?php

namespace App\Models;


class BestProduct extends Model
{

    public static function getTable()
    {
        return 'bests_products';
    } 

    public static function get()
    {
        $products = BestProduct::findAll();
        if ($products) {
            $product = $products[0];
            $product->data = Product::findOne($product->prod_id);
            $product->img = ProductImg::table()->where('prod_id', $product->prod_id)->find_one();
        } else {
            $product = null;
        }
        return $product;

    }

   

}