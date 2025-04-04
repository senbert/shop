<?php

require 'vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;
use App\Models\Model;
use App\Controllers\Controller_Categorie;

session_start();

Model::connect();


SimpleRouter::get('/', 'Controller_Main@action_index');
SimpleRouter::get('category/{cat_id}', 'Controller_Main@action_category');
SimpleRouter::get('product/{prod_id}', 'Controller_Main@action_product');
SimpleRouter::get('shop/', 'Controller_Main@action_shop');
SimpleRouter::post('search/', 'Controller_Main@action_search');

// price filter
SimpleRouter::post('price/filter', 'Controller_Shop@action_price');
// Brands
SimpleRouter::get('brands/{brand_id}', 'Controller_Shop@action_brands');
// Brands Admin
SimpleRouter::get('brand/', 'Controller_Brand@action_index');
SimpleRouter::get('brand/add', 'Controller_Brand@action_add');
SimpleRouter::post('brand/add', 'Controller_Brand@action_create');
SimpleRouter::get('brand/delete/{brand_id}', 'Controller_Brand@action_delete');
SimpleRouter::get('brand/edit/{brand_id}', 'Controller_Brand@action_edit');
SimpleRouter::post('brand/edit_create', 'Controller_Brand@action_edit_create');

// Contacts
SimpleRouter::get('contact/', 'Controller_Contact@action_contact');
SimpleRouter::post('contact/add', 'Controller_Contact@action_add');
// Contacts Admin
SimpleRouter::get('admin/contact', 'Controller_ContactAdmin@action_index');
// SimpleRouter::post('contact/add', 'Controller_Contact@action_add');
SimpleRouter::get('contact/status/{contct_id}', 'Controller_ContactAdmin@action_changeStatus');

// Cart 
SimpleRouter::get('cart/', 'Controller_Cart@action_index');
SimpleRouter::get('cart/add/{prod_id}/{qty?}', 'Controller_Cart@action_add');
SimpleRouter::get('cart/delete/{prod_id}/', 'Controller_Cart@action_delete');
SimpleRouter::post('cart/update/', 'Controller_Cart@action_update');
SimpleRouter::get('/cart/clear/', 'Controller_Cart@action_clear'); 
SimpleRouter::get('/cart/country/', 'Controller_Cart@action_country'); 
SimpleRouter::post('cart/shiping/', 'Controller_Cart@action_shiping');
SimpleRouter::post('cart/discount/', 'Controller_Cart@action_discount');


// admin Product
SimpleRouter::get('admin/products', 'Controller_Product@action_index');
SimpleRouter::get('admin/add_product', 'Controller_Product@action_add');
SimpleRouter::post('/admin/add_product', 'Controller_Product@action_create');
SimpleRouter::get('admin/delete/{id}', 'Controller_Product@action_delete');
SimpleRouter::get('admin/edit/{id}', 'Controller_Product@action_edit');
SimpleRouter::post('admin/edit_create/', 'Controller_Product@action_edit_create');

// admin Discount
SimpleRouter::get('admin/discount', 'Controller_Discount@action_index');
SimpleRouter::get('admin/add_discount', 'Controller_Discount@action_add');
SimpleRouter::post('admin/add_discount', 'Controller_Discount@action_create');
SimpleRouter::get('admin/discount_delete/{id}', 'Controller_Discount@action_delete');
SimpleRouter::get('admin/discount_edit/{id}', 'Controller_Discount@action_edit');
SimpleRouter::post('admin/discount_edit', 'Controller_Discount@action_editDiscount');


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
SimpleRouter::post('/article/add_comment/', 'Controller_Blog@action_addComment');

// Product ADD
SimpleRouter::post('/product/add_comment/', 'Controller_Main@action_addComment');

// Comments
SimpleRouter::get('admin/comments', 'Controller_Comment@action_index');
SimpleRouter::get('admin/comments_delete/{id?}', 'Controller_Comment@action_delete');


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