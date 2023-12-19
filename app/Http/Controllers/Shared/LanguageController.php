<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    

    public function switch($locale)
    {

        if(in_array($locale , ['en', 'ar']))
        {
            Session::put('locale' , $locale);
            session(['locale' => $locale]);

            // if you want to ensure that language changes takes effect immediately,
            // you can also set the app locale in th config
            app()->setLocale($locale);

            $locale = App::currentLocale();
            App::setLocale($locale);
        }

        return redirect()->back();
    }

}
