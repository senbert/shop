<?php

namespace App\Helpers;
use App\Models\ProductImg;
use App\Models\Product;


class Cart
{


    public static function add($prod_id, $qty)
    {
        if (!$prod_id) return; 
        $prod_id = intval($prod_id);
        if (empty($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (array_key_exists($prod_id, $_SESSION['cart'])) {
            $_SESSION['cart'][$prod_id]++;
        } else {
            $_SESSION['cart'][$prod_id] = $qty;
        }
        
        return true;
    }

    public static function getProducts()
    {
        if (empty($_SESSION['cart'])) return [];
        foreach ($_SESSION['cart'] as $prod_id => $qty) {
            $product = Product::findOne($prod_id);
            $product->image = ProductImg::table()->where('prod_id', $prod_id)->findMany()[0];
            $product->qty = $qty;
            $product->countPrice = $product->price * $qty;
            $products[] = $product;
        }
        
        return $products;
    }



}