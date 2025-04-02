<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Discount;
use App\Helpers\File;
use Intervention\Image\ImageManager;


class Controller_Discount extends Controller_Admin
{   
    public function action_index()
    {
        $discounts = Discount::findAll();
        $this->render('discount/index', ['discounts' => $discounts]);
    }

    public function action_add()
    {
        $this->render('discount/add');
    }

    public function action_create()
    {
        $error = Discount::validate($_POST);
        if ($error) {
            $this->addMessage(false, $error)->back();
        }

        $add = Discount::table()->create()->set($_POST)->save();
        $add ? $this->redirect('admin/discount') : $this->back;
    }

    public function action_delete($discount_id)
    {
        $delete = Discount::findOne($discount_id);
        $delete->delete();
        $this->back();
    }

    public function action_edit($discount_id)
    {
        $discount = Discount::table()->where('id',$discount_id)->findMany();

        // $result = Discount::table()->where('id', $discount_id)->findOne;
        $this->render('discount/edit', ['discount' => $discount]);
    }

    public function action_editDiscount()
    {
        dd($_POST);
        $discount = Discount::table()->where('id', $_POST['id'])->findOne();
        dd($discount);
        // $result = Discount::table()->where('id', $discount_id)->findOne;
        $this->render('discount/edit', ['discount' => $discount]);
    }






}