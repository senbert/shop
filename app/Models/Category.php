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
    $new_main_categories = [];
    foreach ($main_categories as $cat) {
        $sub = self::getSub($cat->id);
        if ($sub) {
            $cat->sub = $sub;
            $new_main_categories[] = $cat;
        }

        // $cat->prod = Product::table()->where('cat_id', $cat->id)->findMany();

    }
 
    return $new_main_categories;
}

private static function getSub($parent_id)
{
    $cats = self::table()->where('parent_id', $parent_id)->findMany();
    $newCats = [];
    foreach ($cats as $cat) {
        $countProducts = Product::table()->where('cat_id', $cat->id)->count();
        if ($countProducts) {
            $newCats[] = $cat;
        }
        
    }
    return $newCats;
}

public static function validate($data)
    {
        $v = new \Valitron\Validator($data);
        $v->rule('required', ['name', 'parent_id'])->message('empty_data_category_{field}');
        $v->rule('lengthMin', ['name'], 4)->message('min_string_category_{field}');
        $v->labels(['name' => 'name', 'parent_id' => 'parent_id']);
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }

         



}