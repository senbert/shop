<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\Category;
use App\Helpers\File;
use Intervention\Image\ImageManager;

class Controller_Article extends Controller_Admin
{
    public function action_index()
    {
        $articles = Article::findAll();
        $this->render('article/index', ['articles' => $articles]);
    }

    public function action_add()
    {
        $this->render('article/add');
    }

    public function action_create()
    {
        $error = Article::validate($_POST);

        if ($error) {
            $this->addMessage(false, $error)->back();
        }
        $fileName = $this->uploadImg();
        if ($fileName === false) {
            $this->addMessage(false, 'not_file')->back();
        }
        $result = Article::addBlogData($_POST, $fileName);
        $result ? $this->redirect('admin/articles') : $this->back(); 

    }

     private function uploadImg()
    {
        // dd($_FILES);
        if ($_FILES['img']['error'] == 4) {
           return false;
        }    
        $storage = new \Upload\Storage\FileSystem('assets/img/blog/');
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

    public function action_single($id)
    {
        $article = Article::findOne($id);
        $this->render('article/single', ['article' => $article]);
    }

     public function uploadFile()
    {
        // dd($_FILES);
        if (empty($_FILES['upload']) || $_FILES['upload']['error'] == 4) {
           echo 'Вы не выбрали файл';
           exit;
        }
        // dd($rules);
         $storage = new \Upload\Storage\FileSystem('assets/img/blog');
        $file = new \Upload\File('upload', $storage);
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
            echo '/assets/img/blog/' . $file->getNameWithExtension();
            // $this->redirect('product/index');
        } catch (\Exception $e) {
            $errors = $file->getErrors();
            echo $errors[0];
        } 
        
        }
}