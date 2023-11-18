<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\ContractFeedbackModel;
use App\Models\ContractsModel;
use Illuminate\Http\Request;

class ContractsController extends Controller
{

    public function list(Request $request)
    {
        $query = ContractsModel::with(['user_data', 'order_data', 'contractDoc'])
            ->orderByDesc('created_at');

        $sum        = $query->count("id");
        $contracts  = $query->paginate(100);

        return view('admin.contracts.list', compact('contracts', 'sum'));
    }

    public function details(Request $request)
    {
        $contract = ContractsModel::with(['engineer_data', 'order_data', 'contractDoc'])
            ->where('id', $request->contract_id)
            ->first();

        $contract_feedback = ContractFeedbackModel::with(['user_data', 'contractDoc'])
            ->where('contract_id', $request->contract_id)
            ->first();

        return view('admin.contracts.details', compact('contract', 'contract_feedback'));
    }
}
