<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Models\WorksModel;
use Illuminate\Http\Request;

class EngineersController extends Controller
{
    
    public function list_engineers(Request $request)
    {
        $query      = UsersModel::with("avatar")
        ->orderByDesc('created_at')        
        ->where('user_type', 'engineer');

        $sum        = $query->count("id");
        $engineers  = $query->paginate(100);
        
        return view('clients.engineers.list', compact('engineers','sum'));        
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

        return view('clients.engineers.details', compact('engineer','works', 'sum') );

    }

    public function work_details(Request $request, $engineer_id, $work_id)
    {

        $engineer = UsersModel::with("avatar")              
        ->where('id', $engineer_id)
        ->first();

        $work = WorksModel::with('worksFiles')
        ->where('id', $work_id)
        ->first();
        

        return view('clients.engineers.work_details', compact('engineer','work') );

    }
    
}
