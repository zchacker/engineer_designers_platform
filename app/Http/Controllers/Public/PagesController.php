<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ContactsModel;
use App\Models\PagesModel;
use App\Models\ServicesModel;
use App\Models\UsersModel;
use App\Models\WorksModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PagesController extends Controller
{
    
    public function home(Request $request)
    {
        $active = 'home';
        $currentPath = $request->path();
        $page   = PagesModel::where('path' , 'like',  '%' . $currentPath . '%')->first(); 
        return view('public.index',compact('active', 'page'));
    }

    public function services(Request $request)
    {
        $services = ServicesModel::all();
        $active = 'services';
        $currentPath = $request->path();
        $page   = PagesModel::where('path' , 'like',  '%' . $currentPath . '%')->first(); 
        
        return view('public.services' ,compact('active','services', 'page'));
    }
    
    public function about(Request $request)
    {
        $active = 'about';
        $currentPath = $request->path();
        $page   = PagesModel::where('path' , 'like',  '%' . $currentPath . '%')->first();  
        return view('public.about',compact('active', 'page'));
    }

    public function projects(Request $request)
    {
        $works = WorksModel::with('worksFiles')
        ->orderByDesc('created_at')
        ->where('publish' , 1)
        ->limit(100)
        ->get();
        
        $active = 'projects';

        $currentPath = $request->path();
        $page   = PagesModel::where('path' , 'like',  '%' . $currentPath . '%')->first(); 
        return view('public.projects.index' ,compact('works' , 'active', 'page'));
    }

    public function project_details(Request $request, $project_id)
    {
               
        $work = WorksModel::with(['worksFiles' , 'engineer'])
        ->where('id', $project_id)
        ->first();

        if($work == NULL)
        {
            return abort(Response::HTTP_NOT_FOUND);
        }
       
        $engineer = $work->engineer;
        $currentPath = $request->path();
        $page   = PagesModel::where('path' , 'like',  '%' . $currentPath . '%')->first(); 
        return view('public.projects.details', compact('engineer','work', 'page') );
    }

    public function engineers(Request $request)
    {
        $query      = UsersModel::with("avatar")
        ->orderByDesc('created_at')        
        ->where('user_type', 'engineer');

        $sum        = $query->count("id");
        $engineers  = $query->paginate(200);
        
        $active = 'engineers';

        $currentPath = $request->path();
        $page   = PagesModel::where('path' , 'like',  '%' . $currentPath . '%')->first(); 

        return view('public.engineers.index' ,compact('engineers' , 'active', 'page')); 
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

        $currentPath = $request->path();
        $page   = PagesModel::where('path' , 'like',  '%' . $currentPath . '%')->first(); 

        return view('public.engineers.details', compact('engineer','works', 'sum', 'page') );

    }

    public function work_details(Request $request, $project_id)
    {

        $work = WorksModel::with(['worksFiles' , 'engineer'])
        ->where('id', $project_id)
        ->first();

        if($work == NULL)
        {
            return abort(Response::HTTP_NOT_FOUND);
        }
       
        $engineer = $work->engineer;        

        $currentPath = $request->path();
        $page   = PagesModel::where('path' , 'like',  '%' . $currentPath . '%')->first(); 

        return view('public.projects.details', compact('engineer','work', 'page') );

    }

    public function contact(Request $request)
    {
        $active = 'projects';

        $currentPath = $request->path();
        $page   = PagesModel::where('path' , 'like',  '%' . $currentPath . '%')->first(); 

        return view('public.contact' ,compact( 'active', 'page'));
    }

    public function contact_action(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'name' => 'required',
                'message' => 'required',            
            ], [
                'email.required' => __('email_required'),
                'email.email' => __('email_required'),
                'name.required' => __('name_required'),
                'message.required' => __('message_required'),            
            ]);

            ContactsModel::create($request->all());

            return redirect()->back()->with(['success' => __('sent_successfuly'), 'scrollTo' => 'contact']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->with('scrollTo', 'contact');
        }
    }


}
