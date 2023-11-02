<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeetingsModel;

class MeetingsController extends Controller
{
    
    public function list(Request $request)
    {
        $query = MeetingsModel::with(['engineer_data', 'user_data'])            
            ->orderByDesc('created_at');

        $sum        = $query->count("id");
        $meetings  = $query->paginate(100);

        return view('admin.meetings.list', compact('meetings', 'sum'));
    }

}
