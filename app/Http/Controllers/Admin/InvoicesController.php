<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoicesModel;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    
    public function list(Request $requests)
    {

        $query      = InvoicesModel::orderByDesc('created_at');
        $sum        = $query->count('id');
        $invoices   = $query->paginate(100);

        return view('admin.invoices.list', compact('invoices','sum'));

    }
    
}
