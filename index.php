<?php

require 'vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;
use App\Models\Model;

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
//// admin categori
SimpleRouter::get('admin/categories/{cat_id?}', 'Controller_Categorie@action_index');
SimpleRouter::get('admin/single/{id}', 'Controller_Categorie@action_single');
SimpleRouter::get('admin/add_category', 'Controller_Product@action_add');
SimpleRouter::post('/admin/add_product', 'Controller_Product@action_create');







// namespace
SimpleRouter::setDefaultNamespace('App\Controllers');
// Start the routing
SimpleRouter::start();