<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersModel;

class ClientsController extends Controller
{
    public function list(Request $requests)
    {
        $query      = UsersModel::orderByDesc('created_at')->where('user_type', 'client');
        $sum        = $query->count('id');
        $clients  = $query->paginate(100);
        
        return view('supervisor.clients.list', compact('clients','sum'));
    }
}
