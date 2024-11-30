<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\Category;


class Controller_Product extends Controller_Admin
{
 
    public function action_index()
    {
        $products = Product::findAll();
        foreach ($products as $product) {
            $product->img = ProductImg::table()->where('prod_id', $product->id)->find_one();
            $product->cat = Category::findOne($product->cat_id);
            // dd($product->cat_id);
        }

        $this->render('product/index', ['products' => $products]);
    }

    public function action_add()
    {
        $categories = Category::findAll();
        $this->render('product/add', ['categories' => $categories]);
    }

    public function action_create()
    {
        $error = Product::validate($_POST);
        if ($error) {
            $this->addMessage(false, $error)->back();
        }
        $product = Product::table()->create()->set($_POST);
        $result = $product->save();
        $this->addMessage($result, 'add_product');
        $result ? $this->redirect('admin/product/' . $product->id()) : $this->back();
    }

    public function action_delete($id)
    {
        // dd($id);
        $delete = Product::delete($id);
        $this->redirect('admin/products');
    }

    public function action_single($id)
    {
        // dd($id);
        $product = Product::findOne($id);
        $product->category = Category::findOne($product->cat_id);
        $images = ProductImg::table()->where('prod_id', $product->id)->findMany();
        $this->render('product/single', compact('product', 'images'));
    }

    public function action_contact()
    {
        // dd($image);
        $this->render('product/contacts');
    }

    public function action_categories()
    {
        // dd('Hello');
        $this->render('product/categories');
    }




}



