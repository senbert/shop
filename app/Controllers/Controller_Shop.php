<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\Category;
use App\Models\FoodComment;
use App\Models\ProductImg;
use App\Models\BestProduct;
use App\Helpers\Pagination;


class Controller_Shop extends Controller_Public
{
    public function action_price()
    {
        // $products = Product::table()->where_between('price', [$_POST['min_price'], $_POST['max_price'] ])->findMany();
        $number1 = $_POST['min_price'];
        $number2 = $_POST['max_price'];
        $products = Product::table()
        ->where_gte('price', $number1)
        ->where_lte('price', $number2)
        ->findMany();

        foreach ($products  as $product) {
            $product->img = ProductImg::table()->where('prod_id', $product->id)->find_one();
           }

        $this->render('main/category/index', ['products' => $products]);
    }



}