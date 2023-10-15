<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function home(Request $request)
    {
        return view('public.index');
    }

    public function services(Request $request)
    {
        return view('public.services');
    }
    
    public function about(Request $request)
    {
        return view('public.about');
    }

    public function projects(Request $request)
    {
        return view('public.projects');
    }

    public function contact(Request $request)
    {
        return view('public.contact');
    }

}
