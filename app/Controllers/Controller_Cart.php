<?php
namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\Category;
use App\Models\Country;
use App\Models\CountryState;
use App\Models\Discount;
use App\Models\Brand;
use App\Helpers\File;
use App\Helpers\Cart;
use Intervention\Image\ImageManager;


class Controller_Cart extends Controller_Public
{
    public function action_index()
    {
        $countris = Country::findAll();
        
        if (isset($_SESSION['country_id'])) {
            $states = CountryState::table()->where('country_id', $_SESSION['country_id'])->findMany(); 
        } else {
             $states = null;
        }
       
        // dd($countris);
        $this->render('cart/index', compact('countris', 'states'));
    }

    public function action_country()
    {
        $states = CountryState::table()->where('country_id', $_GET['country_id'])->findArray();
        // dd($states);
        $states = json_encode($states);
        echo $states;
        // $arr = [
        //     'name' => 'Maks',
        //     'age' => 23
        // ];
        // $arr = json_encode($arr);
        // echo $arr;
        // if ($_GET['country_id']) {
        //     $_SESSION['country_id'] = $_GET['country_id'];
        // }
    // $this->redirect('cart');
        
    }

    public function action_add($prod_id, $qty = 1)
    {

        $result = Cart::add($prod_id, $qty);
        $this->back();
        // $_SESSION['cart'][$prod_id] = $qty;
       
    }
    public function action_delete($prod_id)
    {
       Cart::delete($prod_id);
       $this->back();
    }

    public function action_update()
    {
        Cart::update($_POST);
        $this->back();
    }

    public function action_clear()
    {
        Cart::cleare();
        $this->home();
    }

    public function action_shiping()
    {
        // dd($_SESSION);
        if (!empty($_POST)) {
            $state = CountryState::findOne($_POST['state_id']); 
            $_SESSION['shiping'] = $state->price;
            $_SESSION['country_id'] = $state->country_id;
            $_SESSION['state_id'] = $state->id;
            $this->redirect('cart');
        }
        // $_SESSION['country'] = Country::findOne($state->country_id);
        $this->back();
        
    }

    public function action_discount()
    {
        $discount = Discount::table()->where('discount', $_POST['discount'])->findOne();
        if ($discount) {
            $_SESSION['discount'] = $discount->money;
        }
        
        $this->redirect('cart');
        

    }

    


    





}