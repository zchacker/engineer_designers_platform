<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\UsersModel;
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
        //dd($engineers->first()->avater());
        return view('clients.engineers.list', compact('engineers','sum'));        
    }

    public function details(Request $request, $engineer_id)
    {
        dd("ID: $engineer_id");
        return;
    }
    
}
