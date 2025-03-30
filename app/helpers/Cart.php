<?php

namespace App\Helpers;
use App\Models\ProductImg;
use App\Models\Product;
use App\Models\Discount;


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
            $images = ProductImg::table()->where('prod_id', $prod_id)->findMany();
            $product->image = $images ? $images[0] : false;
            $product->qty = $qty;
            $product->countPrice = $product->price * $qty;
            $products[] = $product;
        }
        // dd($products);
        return $products;
    }

    public static function update($data)
    {
        foreach ($data as $prod_id => $qty) {
            $_SESSION['cart'][$prod_id] = $qty;
        }
    }

    public static function delete($prod_id)
    {
         if ($_SESSION['cart']) {
            unset($_SESSION['cart'][$prod_id]);
        }
    }

    public static function countSubtotalPrice($products)
    {
        if (empty($products)) return 0; 
      $sum = 0;
        foreach ($products as $product) {
            $sum += $product->countPrice;
        }  
        return $sum;
    }

    public static function cleare()
    {
         unset($_SESSION['cart']);
    }

    public static function calculateTotalCart()
    {
        if (empty($_SESSION['cart'])) return 0;
         $sum = 0;
        foreach ($_SESSION['cart'] as $count) {
            $sum += $count;
        }
        if ($sum < 10) {
            $sum = '0' . $sum;
        }
        return $sum;
    }

    



}