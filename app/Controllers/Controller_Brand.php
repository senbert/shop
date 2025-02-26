<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\Category;
use App\Models\Brand;
use App\Helpers\File;
use Intervention\Image\ImageManager;

class Controller_Brand extends Controller_Admin
{
    public function action_index()
    {
        $brands = Brand::findAll();
        $this->render('brand/index', ['brands' => $brands]);
    }

    public function action_add()
    {
        $this->render('brand/add');

    }

    public function action_create()
    {
        $error = Brand::validate($_POST);
        if ($error) {
            $this->addMessage(false, $error)->back();
        }
        
        $result = Brand::table()->create()->set($_POST)->save();
        $this->addMessage($result, 'add_brand');
        $result ? $this->redirect('brand') : $this->back();
       
        
    }

    public function action_delete($brand_id)
    {
        $delete = Brand::table()->findOne($brand_id);
        $delete->delete();
        $this->redirect('brand');
    }

    public function action_edit($brand_id = null)
    {
        
        $brand = Brand::findOne($brand_id);
        $this->render('brand/edit', ['brand' => $brand]);

    }

    public function action_edit_create()
    {
        // dd($_POST);
            $create = Brand::table()->where('id', $_POST['id'])->findOne();
            $create->set($_POST);
            $create->save();
            $create ? $this->redirect('brand') : $this->back();
            $this->addMessage(true, 'edit_brand');

    }


}