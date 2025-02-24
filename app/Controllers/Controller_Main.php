<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\Category;
use App\Models\FoodComment;
use App\Models\ProductImg;
use App\Models\BestProduct;
use App\Helpers\Pagination;


class Controller_Main extends Controller_Public
{

    public function action_index()
    {
        $products = Product::getPopular();

        $articles = Article::table()->order_by_desc('id')->limit(3)->findMany();
        $bestProduct = BestProduct::get();
    
        // dd($products);
        $this->render('main/index', ['products' => $products, 'articles' => $articles, 'best_product' => $bestProduct]);
    }

    public function action_shop()
    {
        $this->namePage = 'Shop Page';
            $totalItems = Product::table()->count(); // Общее количество элементов
            $perPage = 3; // Количество элементов на одной странице
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Текущая страница (из GET-запроса)
            // $urlPattern = '/pagination/(:num)'; // Шаблон URL для пагинации
            $urlPattern = '/shop?page=(:num)';
            $paginator = new \JasonGrimes\Paginator($totalItems, $perPage, $currentPage, $urlPattern);
            $products = Product::table()
            ->offset(($currentPage - 1) * $perPage)
            ->limit($perPage)
            ->findMany();
           

        foreach ($products  as $product) {
            $product->img = ProductImg::table()->where('prod_id', $product->id)->find_one();
           }

        

        $this->render('main/shop/index', compact('products', 'paginator'));
    }

     public function action_category($cat_id)
    {
        $this->namePage = 'Category Page';
        $products = Product::table()->where('cat_id', $cat_id)->findMany();
        $paginator = false;
        $category = Category::findOne($cat_id);
        
        $category->parent = Category::findOne($category->parent_id);
       
        $category->parent->childrenSub = Category::getSub($category->parent_id);
        foreach ($products  as $product) {
            $product->img = ProductImg::table()->where('prod_id', $product->id)->find_one();
           }

         $this->render('main/category/index', compact('products', 'category'));

    }


    public function action_product($prod_id)
    {
        // dd($prod_id);
        $this->namePage = 'Product Details';

        $product = Product::table()->findOne($prod_id);

        if ($product) {
            $product->images = ProductImg::table()->where('prod_id', $prod_id)->findMany();
        }
        
        

        $comments = FoodComment::findAll();
        $product->rating = Product::countRating($comments);
       
        $count = count($comments);
    
        
        $this->render('main/product/index', ['product' => $product, 'comments' => $comments, 'count' => $count ]);
        
        
    }

    public function action_addComment()
    {
        $_POST['date'] = time();
        $result = FoodComment::table()->create()->set($_POST)->save();
        $this->redirect('product/add_comment');
    }

    public function action_search()
    {
        $products = Product::table()->where_like('name', '%'. $_POST['search'] .'%')->findMany();

        foreach ($products  as $product) {
            $product->img = ProductImg::table()->where('prod_id', $product->id)->find_one();
           }

         $this->render('main/category/index', compact('products'));
        
    }

    

}