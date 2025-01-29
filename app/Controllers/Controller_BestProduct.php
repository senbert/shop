<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\Category;
use App\Helpers\File;
use Intervention\Image\ImageManager;
use App\Models\BestProduct;


class Controller_BestProduct extends Controller_Admin
{
  public function action_index()
  {
    $product = BestProduct::get();

    $this->render('best_product/index', ['product' => $product]);
  }

  public function action_delete()
  {
    $product = BestProduct::findAll()[0];
    $product->delete();
    $this->addMessage(true, 'delete_best_product')->back();
  }

  public function action_create($prod_id)
  {
    $this->render('best_product/add', ['prod_id' => $prod_id]);
  }

  public function action_add()
  {
    $best = BestProduct::findAll();
    if ($best) {
      $best[0]->delete();
    }
    BestProduct::table()->create()->set($_POST)->save();
    $this->addMessage(true, 'add_delete_best_product')->redirect('admin/product/' . $_POST['prod_id']);
  }

 


}