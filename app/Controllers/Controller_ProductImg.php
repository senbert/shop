<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\Category;
use App\Helpers\File;
use Intervention\Image\ImageManager;


class Controller_ProductImg extends Controller_Admin
{
    public function action_add($prod_id)
    {
        $this->render('product_img/add', ['prod_id' => $prod_id]);
    }

    public function action_create()
    {
        $fileName = $this->uploadFile();
        if ($fileName === false) {
            $this->addMessage(false, 'not_file')->back();
        }  elseif (is_array($fileName)) {
            $this->addMessage(false, $fileName[0])->back();
        } else {
            $this->dublicatImg($fileName); 
        }
        $file = ProductImg::table()->create();
        $file->file_name = $fileName;
        $file->prod_id = $_POST['prod_id'];
        $file->save();
        $this->addMessage(true, 'add_image')->redirect('admin/product/' . $_POST['prod_id']);
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
        $max_size = new \Upload\Validation\Size('10B');
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
            if ($errors[0] == 'File size is too large') {
                return ['file_size'];
            } elseif ($errors[0] == 'Invalid mimetype') {
                return ['file_type'];
            }
            dd($errors);
            
        
        }
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

}