<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\BestProduct;


class Controller_Main extends Controller_Public
{

    public function action_index()
    {
        $products = Product::getPopular();

        $articles = Article::table()->order_by_desc('id')->limit(3)->findMany();
        $bestProduct = BestProduct::get();
    
        // dd($products);
        $this->render('main/index', ['products' => $products, 'articles' => $articles, 'best_product' => $bestProduct]);
    }


    public function action_shop($cat_id = null)
    {
        $this->namePage = 'Shop Page';
        if ($cat_id) {
            $products = Product::table()->where('cat_id', $cat_id)->findMany();
            // dd($products);   
        } else {
           $products = Product::findAll();
        }

        $this->render('main/shop/index', ['products' => $products]);
    }

    public function action_product($prod_id)
    {
        // dd($prod_id);
        $this->namePage = 'Product Details';

        $product = Product::table()->findOne($prod_id);
        // dd($product);

        $this->render('main/product/index', ['product' => $product]);
        
        
        
    }

}