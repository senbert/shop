<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\Category;


class Controller_Categorie extends Controller_Admin
{
    

    public function action_index($cat_id = null)
    {
        if ($cat_id) {
            $categories =  Category::table()->where('parent_id', $cat_id)->findMany();
        } else {
            $categories = Category::table()->where_gt('parent_id', Category::PARENT_MAIN)->findMany();
        }

        foreach ($categories as $category) {
            $category->parent = Category::findOne($category->parent_id);
        }

        $main_cats = Category::table()->where('parent_id', Category::PARENT_MAIN )->findMany();

        $this->render('category/index', ['categories' => $categories, 'main_cats' => $main_cats, 'cat_id' => $cat_id]);
    }

    public function action_add()
    {
        $categories = Category::table()->where('parent_id', Category::PARENT_MAIN)->findMany();
        $this->render('category/add', ['categories' => $categories]);
    }

    public function action_create()
    {
        $error = Category::validate($_POST);
        if ($error) {
            $this->addMessage(false, $error)->back();
        }

        $result = Category::table()->create()->set($_POST)->save();
        $this->addMessage($result, 'add_category');
        $result ? $this->redirect('admin/categories') : $this->back();

    }




}