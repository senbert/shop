<?php

namespace App\Models;


class Product extends Model
{

    const POPULAR = 1;
    
    const CAT_ID = 1;
    
    public static function getTable()
    {
        return 'products';
    } 

    public static function add($data)
    {
        $add = self::table()->create($data);
        $add->set($data);
        return $add->save();
    }

    public static function delete($id)
    {
        $delete =  self::table()->find_one($id);
        $delete->delete();
    }

    public static function validate($data)
    {
        $v = new \Valitron\Validator($data);
        $v->rule('required', ['name', 'price'])->message('empty_data_product_{field}');
        $v->rule('lengthMin', ['name','price'], 4)->message('min_string_product_{field}');
        $v->labels(['name' => 'name', 'price' => 'price']);
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }




}