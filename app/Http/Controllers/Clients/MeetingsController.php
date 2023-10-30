<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\MeetingsModel;
use Illuminate\Http\Request;

class MeetingsController extends Controller
{
    
    public function list(Request $request)
    {
        $query = MeetingsModel::with(['engineer_data', 'user_data'])
            ->where('user_id', $request->user()->id)
            ->orderByDesc('created_at');

        $sum        = $query->count("id");
        $meetings  = $query->paginate(100);

        return view('clients.meetings.list', compact('meetings', 'sum'));
    }
    
}
