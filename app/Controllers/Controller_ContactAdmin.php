<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Article;
use App\Models\ProductImg;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Contact;
use App\Helpers\File;
use Intervention\Image\ImageManager;


class Controller_ContactAdmin extends Controller_Admin
{
    public function action_index()
    {
       $contacts = Contact::findAll();
        $this->render('admin/contactAdmin/index', ['contacts' => $contacts]);
    }

    public function action_changeStatus($contact_id)
    {
        $contact = Contact::findOne($contact_id);
        $contact->status = $contact->status ? 0 : 1;
        $contact->save();
        $this->redirect('admin/contact');
    }



     

}