<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    
    public function list(Request $request)
    {
        return view('engineer.contract.list');
    }

    public function details(Request $request)
    {
        return view('engineer.contract.details');
    }

    public function create(Request $request)
    {
        return view('engineer.contract.create');
    }

    public function create_action(Request $request) 
    {

    }

    public function update_status(Request $request)
    {

    }

}
