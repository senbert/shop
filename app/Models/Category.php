<?php
namespace App\Models;

class Category extends Model
{

    const PARENT_MAIN = 0;

    

    public static function getTable()
    {
        return 'categories';
    } 

    // public static function findAllCategori()
    // {
    //     return \ORM::forTable(self::getTable())->findMany();
    // }

    public static function getParentId()
    {

        $items =  self::table()->where('parent_id', 0)->findMany();
        $category = []; 
        foreach ($items as $row) {
            // dd($row);
            $category[] = $row;
            // dd($category);
        }
        return $category;
       
    }
    
public static function getCategoriesTree()
{
    $main_categories = self::table()->where('parent_id', self::PARENT_MAIN)->findMany();
// dd($main_categories);
    foreach ($main_categories as $cat) {
        $cat->sub = self::table()->where('parent_id', $cat->id)->findMany();

    }

    return $main_categories;
}

         



}