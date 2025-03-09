<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Brand;
use App\Helpers\File;
use Intervention\Image\ImageManager;


class Controller_Contact extends Controller_Public
{

    public function action_contact()
    {
        $this->render('contact/contact');
    }

    public function action_add()
    {

        $error = Contact::validate($_POST);
        if ($error) {
            $this->addMessage(false, $error)->back();
        }
        $result = Contact::table()->create()->set($_POST)->save();
        $this->redirect('contact');
    }

    
 

}