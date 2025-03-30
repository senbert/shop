<?php

namespace App\Controllers;
use App\Models\Category;
use App\helpers\Cart;
use App\Helpers\Message;
use App\Models\Brand;
use App\Models\Country;

class Controller_Public extends Controller_Base
{
    public $layout = 'main';    
    public $namePage = '';

    public function render($template, $data = null)
    {
        $data['cart'] = $this->getInfoCart();
        // dd($data['cart']);
        $data['content'] = $template;
        $data['brands'] = Brand::findAll();
        $data['categories'] = Category::getCategoriesTree();
        $data['name_page'] = $this->namePage;
        $data['message'] = Message::display();
       

    //    dd($data);
        \App\Core\View::render($this->layout, $data);
//        dd($tamplate);
    }

    public function getInfoCart()
    {
        $cart = [];
        $cart['count'] = Cart::calculateTotalCart();
        $cart['products'] = Cart::getProducts();
        $cart['subTotal'] = Cart::countSubtotalPrice($cart['products']);
        if (isset($_SESSION['discount'])) {
            $cart['subTotal'] = $_SESSION['subTotal'] - $_SESSION['discount'];
        } 
        $cart['shiping'] = isset($_SESSION['shiping']) ? $_SESSION['shiping'] : 0;
        $cart['grant_tottal'] = isset($cart['shiping']) ? $cart['subTotal'] +  $cart['shiping'] : 0;
        $cart['country_id'] = isset($_SESSION['country_id']) ? $_SESSION['country_id'] : null;
        $cart['state_id'] = isset($_SESSION['state_id']) ? $_SESSION['state_id'] : null;
        
        return $cart;
    }



}