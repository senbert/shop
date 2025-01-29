<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\Category;
use App\Helpers\File;
use Intervention\Image\ImageManager;


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

        // try {
        //     $img = new File('img', 5000000, ['png', 'jpg', 'jpeg']);
        //     $img->upload('assets/img/original');
        // } catch (\Exception $e) {
        //      $this->addMessage(false, $e->getMessage())->back();
        // }

        $error = Product::validate($_POST);
        if ($error) {
            $this->addMessage(false, $error)->back();
        }
        $fileName = $this->uploadFile();
        if ($fileName === false) {
               $this->addMessage(false, 'not_file')->back();
        } else {
            $this->dublicatImg($fileName); 
        }
        $product = Product::table()->create()->set($_POST);
        $result = $product->save();
        $file = ProductImg::table()->create();
        $file->file_name = $fileName;
        $file->prod_id = $product->id();
        $file->save();
        $this->addMessage($result, 'add_product');
        $result ? $this->redirect('admin/product/' . $product->id()) : $this->back();
    } 

    public function dublicatImg($file)
    {
        // dd($file);
        $manager = new ImageManager(['driver' => 'gd']);
        $img = $manager->make('assets/img/product/original/' . $file);
        $img->resize(270, 265);
        $img->save('assets/img/product/card/' . $file);

        $img->resize(600, 656);
        $img->save('assets/img/product/big/' . $file);

        $img->resize(141, 135);
        $img->save('assets/img/product/min/' . $file);


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

    private function uploadFile()
    {
        // dd($_FILES);
        if ($_FILES['img']['error'] == 4) {
           return false;
        }    
        $storage = new \Upload\Storage\FileSystem('assets/img/product/original');
        $file = new \Upload\File('img', $storage);
        // dd($file->getErrorCode());
        $new_filename = time();
     
        $valid_types = new \Upload\Validation\Mimetype(['image/png', 'image/jpg', 'image/jpeg']);
        // dd($valid_types);
        $max_size = new \Upload\Validation\Size('10M');
        // dd($max_size);
        $rules = [$valid_types, $max_size];
        // dd($rules);
        $file->addValidations($rules);

        $file->setName($new_filename);
        try {
            $file->upload();
            return $file->getNameWithExtension();
            // $this->redirect('product/index');
        } catch (\Exception $e) {
            $errors = $file->getErrors();
            dd($errors);
        
        }
    }

    public function changePopular($id_product)

    {
        $product = Product::findOne($id_product);
        // dd($product);

        $product->popular = $product->popular ? Product::NOT_POPULAR : Product::POPULAR; 
        $product->save();
        $this->addMessage(true, 'change_popular')->back();
    }

    public function action_popular()

    {
        $products = Product::table()->where('popular', Product::POPULAR)->findMany();
        foreach ($products as $product) {
                // dd($product);
            $product->img = ProductImg::table()->where('prod_id', $product->id)->findMany();
            $product->cat = Category::findOne($product->cat_id);
        }
        $this->render('product/popular', ['products' => $products]);
    }

    public function action_popular_delete($product_id)
    {
        $product = Product::findOne($product_id);
        $product->popular = Product::NOT_POPULAR;
        $product->save();
        $this->addMessage(true, 'delete_popular')->back();

    }






}



