<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorksModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorksController extends Controller
{
    public function list(Request $request)
    {
        $query      = WorksModel::with(['worksFiles', 'engineer'])->orderByDesc('created_at');
        $sum        = $query->count('id');
        $works      = $query->paginate(100);
        return view('admin.works.list', compact('works', 'sum'));
    }

    public function details(Request $request)
    {
        $work = WorksModel::with('worksFiles')
            ->where('id', $request->work_id)
            ->first();

        return view('admin.works.details', compact('work'));
    }

    public function edit(Request $request)
    {
        $work = WorksModel::with('worksFiles')
            ->where('id', $request->work_id)
            ->first();

        return view('admin.works.edit', compact('work'));
    }

    public function edit_action(Request $request)
    {
        $rules = array(
            'title' => 'required|max:255',
            'description' => 'required',
        );

        $messages = [
            'title.required' => __('title_required'),
            'description.required' => __('description_required'),
            'title.max' => __('title_max', ['max' => 255]),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            // update work details
            $work                 = WorksModel::find($request->work_id);
            $work->title          = $request->title;
            $work->description    = $request->description;
            $work->title_en       = $request->title_en;
            $work->description_en = $request->description_en;

            if ($work->update()) {
                return back()->with(['success' => __('updated_successfuly')]);
            } else {
                return back()->withErrors(['error' => __('unknown_error')]);
            }
        } else {

            $error     = $validator->errors();
            $allErrors = "";

            foreach ($error->all() as $err) {
                $allErrors .= $err . " <br/>";
            }

            return back()
                ->withErrors(['error' => $allErrors])
                ->withInput($request->all());
        }
    }

    public function publish_unpublish_work(WorksModel $work)
    {
        $work->publish = !$work->publish;
        $work->update();

        return redirect()->route('admin.work.list');
    }
}
