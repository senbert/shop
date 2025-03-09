<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\Category;
use App\Models\Brand;
use App\Helpers\File;
use App\Helpers\Cart;
use Intervention\Image\ImageManager;


class Controller_Cart extends Controller_Public
{
    public function action_index()
    {
        $products = Cart::getProducts();

        $this->render('cart/index', ['products' => $products]);
    }

    public function action_add($prod_id, $qty = 1)
    {
        $result = Cart::add($prod_id, $qty);
        $this->back();
        // $_SESSION['cart'][$prod_id] = $qty;
       
    }


}