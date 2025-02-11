<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
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

    public function action_shop($cat_id = null)
    {
        $this->namePage = 'Shop Page';
        if ($cat_id) {
            $products = Product::table()->where('cat_id', $cat_id)->findMany();
            $paginator = false;
            // dd($products);   
        } else {
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
           
        }

        foreach ($products  as $product) {
            $product->img = ProductImg::table()->where('prod_id', $product->id)->find_one();
           }
           
        $this->render('main/shop/index', ['products' => $products, 'paginator' => $paginator]);
    }

    public function action_product($prod_id)
    {
        // dd($prod_id);
        $this->namePage = 'Product Details';

        $product = Product::table()->findOne($prod_id);
        $product->img = ProductImg::table()->where('prod_id', $prod_id)->find_one();
        $products = Product::getAllImg();
        $comments = FoodComment::findAll();;
       

        $this->render('main/product/index', ['product' => $product,'products' => $products, 'comments' => $comments ]);
        
        
    }

    public function action_addComment()
    {
        $_POST['date'] = time();
        $result = FoodComment::table()->create()->set($_POST)->save();
        $this->redirect('product/add_comment');
    }

    

}