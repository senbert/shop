<?php

require 'vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;
use App\Models\Model;
use App\Controllers\Controller_Categorie;

session_start();

Model::connect();


SimpleRouter::get('/', 'Controller_Main@action_index');
SimpleRouter::get('shop/{cat_id?}', 'Controller_Main@action_shop');
SimpleRouter::get('product/{prod_id}', 'Controller_Main@action_product');

// admin Product
SimpleRouter::get('admin/products', 'Controller_Product@action_index');
SimpleRouter::get('admin/add_product', 'Controller_Product@action_add');
SimpleRouter::post('/admin/add_product', 'Controller_Product@action_create');
SimpleRouter::get('admin/delete/{id}', 'Controller_Product@action_delete');
// admin sincle product
SimpleRouter::get('admin/product/{id}', 'Controller_Product@action_single');
SimpleRouter::get('admin/image/{id}', 'Controller_Product@action_image');
SimpleRouter::get('admin/contacts/', 'Controller_Product@action_contact');
// hange popular
SimpleRouter::get('admin/change_popular/{id}', 'Controller_Product@changePopular');
SimpleRouter::get('admin/popular/', 'Controller_Product@action_popular');
SimpleRouter::get('admin/delete_popular/{id}', 'Controller_Product@action_popular_delete');

// Blog
SimpleRouter::get('/blog/{tag?}', 'Controller_Blog@action_index');
SimpleRouter::get('blog/single/{id}', 'Controller_Blog@action_single');

//// Best product
SimpleRouter::get('admin/best_product/', 'Controller_BestProduct@action_index'); 
SimpleRouter::get('admin/delete_best_product/', 'Controller_BestProduct@action_delete'); 
SimpleRouter::get('admin/add_best_product/{id}', 'Controller_BestProduct@action_create');
SimpleRouter::post('admin/add_best_product/', 'Controller_BestProduct@action_add');
//// admin categori
SimpleRouter::get('admin/categories/{cat_id?}', 'Controller_Categorie@action_index');
SimpleRouter::get('admin/single/{id}', 'Controller_Categorie@action_single');
SimpleRouter::get('admin/add_category', 'Controller_Categorie@action_add');
SimpleRouter::post('/admin/add_category', 'Controller_Categorie@action_create');
SimpleRouter::get('cat/delete/{id}', 'Controller_Categorie@action_delete');
//Edit
SimpleRouter::get('cat/edit/{id}', 'Controller_Categorie@action_edit');
SimpleRouter::post('/admin/edit', function() {
    $controller = new Controller_Categorie();
    $error = Category::validate($_POST);
    if ($error) {
        $controller->addMessage(false, $error)->back();
    }
    return $controller->action_editCat($_POST);
});

// add img product
SimpleRouter::get('product_img/add/{id}', 'Controller_ProductImg@action_add');
SimpleRouter::post('product_img/add/', 'Controller_ProductImg@action_create');
SimpleRouter::get('product_img/delete/{id}', 'Controller_ProductImg@action_delete');
// SimpleRouter::post('/admin/edit', 'Controller_Categorie@action_editCat');

//Admin Articles 
SimpleRouter::get('admin/articles', 'Controller_Article@action_index');
SimpleRouter::get('article/add', 'Controller_Article@action_add');
SimpleRouter::post('article/add', 'Controller_Article@action_create');
SimpleRouter::get('article/single/{id}', 'Controller_Article@action_single');



SimpleRouter::post('upload/file', 'Controller_Article@uploadFile');







// namespace
SimpleRouter::setDefaultNamespace('App\Controllers');
// Start the routing
SimpleRouter::start();