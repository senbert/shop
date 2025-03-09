<?php

namespace App\Models;


class Contact extends Model
{
    public static function getTable()
    {
        return 'contacts';
    }

    public static function validate($data)
    {
        $v = new \Valitron\Validator($data);
        $v->rule('required', ['name', 'email'])->message('empty_data_product_{field}');
        // $v->rule('lengthMin', ['name','price'], 4)->message('min_string_product_{field}');
        $v->labels(['name' => 'name', 'email' => 'email']);
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }

    

}