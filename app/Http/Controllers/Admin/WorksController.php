<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorksModel;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function list(Request $request)
    {
        $query      = WorksModel::orderByDesc('created_at');
        $sum        = $query->count('id');
        $works      = $query->paginate(100);
        return view('admin.works.list', compact('works','sum'));
    }

    public function details(Request $request)
    {
        $work = WorksModel::with('worksFiles')
        ->where('id', $request->work_id)        
        ->first();        

        return view('admin.works.details', compact('work') );
    }

    public function publish_unpublish_work(Request $request)
    {

    }
}
