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
    
}
