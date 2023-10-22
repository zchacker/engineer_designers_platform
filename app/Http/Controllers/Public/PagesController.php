<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\WorksModel;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function home(Request $request)
    {
        return view('public.index');
    }

    public function services(Request $request)
    {
        $active = 'services';
        return view('public.services' ,compact('active'));
    }
    
    public function about(Request $request)
    {
        $active = 'about';
        return view('public.about',compact('active'));
    }

    public function projects(Request $request)
    {
        $works = WorksModel::with('worksFiles')
        ->orderByDesc('created_at')
        ->where('publish' , 1)
        ->limit(100)
        ->get();
        
        $active = 'projects';
        return view('public.projects' ,compact('works' , 'active'));
    }

    public function contact(Request $request)
    {
        $active = 'projects';
        return view('public.contact' ,compact( 'active'));
    }

}
