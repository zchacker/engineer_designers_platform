<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Models\WorksModel;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function home(Request $request)
    {
        $active = 'home';
        return view('public.index',compact('active'));
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

    public function engineers(Request $request)
    {
        $query      = UsersModel::with("avatar")
        ->orderByDesc('created_at')        
        ->where('user_type', 'engineer');

        $sum        = $query->count("id");
        $engineers  = $query->paginate(200);
        
        $active = 'engineers';
        return view('public.engineers' ,compact('engineers' , 'active')); 
    }

    public function details(Request $request, $engineer_id)
    {

        $engineer = UsersModel::with("avatar")              
        ->where('id', $engineer_id)
        ->first();

        $query = WorksModel::with('worksFiles')
        ->where('engineer_id', $engineer_id);

        $sum        = $query->count("id");
        $works      = $query->paginate(100);

        return view('public.engineers.details', compact('engineer','works', 'sum') );

    }

    public function work_details(Request $request, $engineer_id, $work_id)
    {

        $engineer = UsersModel::with("avatar")              
        ->where('id', $engineer_id)
        ->first();

        $work = WorksModel::with('worksFiles')
        ->where('id', $work_id)
        ->first();
        

        return view('public.engineers.work_details', compact('engineer','work') );

    }

    public function contact(Request $request)
    {
        $active = 'projects';
        return view('public.contact' ,compact( 'active'));
    }

}
