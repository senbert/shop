<?php

namespace App\Models;


class Article extends Model
{
    public static function getTable()
    {
        return 'articles';
    } 

    public static function addBlogData($data, $fileName)
    {
        $add = self::table()->create($data, $fileName);
        if ($fileName) {
            $data['img'] = $fileName;
        }
        $add->set($data);
        return $add->save();

    }

    public static function validate($data)
    {
        $v = new \Valitron\Validator($data);
        $v->rule('required', ['autor', 'title', 'data', 'preview', 'content'])->message('empty_data_product_{field}');
        // $v->rule('lengthMin', ['name','price'], 4)->message('min_string_product_{field}');
        $v->labels(['autor' => 'autor', 'title' => 'title', 'data' => 'data', 'preview' => 'preview', 'content' => 'content']);
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }
    


}