<?php
namespace App\Controllers;

use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\BestProduct;
use App\Models\Article_Tag;
use App\Helpers\Pagination;


class Controller_Blog extends Controller_Public
{

    public function action_index($tag = null)
    {
        // if ($tag) {
        //     $article_id = Article_Tag::table()->where('name', $tag)->findMany();
        //     foreach ($article_id as $iteam) {
        //         $articles[] = Article::findOne($iteam->article_id); 
        //     }
        // } else {
        //     $articles = Article::table()->limit(4)->findMany();
        // }
        // 
       // Pagination
    //     $pagination = new Pagination(2, Article::table()->count());

    //     $articles = Article::table()->limit(2)->offset($pagination->offset)->findMany();
        
     
    //    $this->render('blog/index', ['articles' => $articles, 'pagination' => $pagination]);

        $totalItems = Article::table()->count(); // Общее количество элементов
        $perPage = 2; // Количество элементов на одной странице
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Текущая страница (из GET-запроса)
        // $urlPattern = '/pagination/(:num)'; // Шаблон URL для пагинации
        $urlPattern = '/blog?page=(:num)';
        $paginator = new \JasonGrimes\Paginator($totalItems, $perPage, $currentPage, $urlPattern);
        // Получение данных с учетом лимита и смещения для текущей страницы
        // $url = $paginator->getCurrentPage();
        // dd($url);
        $articles = Article::table()
        ->offset(($currentPage - 1) * $perPage)
        ->limit($perPage)
        ->findMany();

        $this->render('blog/index', compact('paginator', 'articles'));

    }

     public function action_single($id)
    {
        $article = Article::findOne($id);
        $article->tags = Article_Tag::table()->where('article_id', $id)->findMany();
       $this->render('blog/single', ['article' => $article]);
    }
   



}

