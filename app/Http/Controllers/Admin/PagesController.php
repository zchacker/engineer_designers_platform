<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PagesModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public function list(Request $request)
    {
        $query      = PagesModel::orderByDesc('created_at');
        $sum        = $query->count('id');
        $pages  = $query->paginate(100);
        return view('admin.pages.list', compact('pages', 'sum'));
    }

    public function create(Request $request)
    {
        return view('admin.pages.create');
    }

    public function create_action(Request $request)
    {
        $rules = array(
            'title'         => 'required',
            //'description'   => 'required',
            'language'      => 'required',
            'path'          => 'required',
        );

        $messages = [
            'title.required'        => __('name_required'),
            'description.required'  => __('description_page_required'),
            'language.required'     => __('language_required'),
            'path.required'         => __('path_required'),
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            // create user account
            $post = PagesModel::create($request->all());

            return back()->with(['success' => __('added_successfuly')]);
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

    public function edit(Request $request)
    {

        $page = PagesModel::where('id', $request->id)->first();

        if ($page == null) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        return view('admin.pages.edit', compact('page'));
    }

    public function edit_action(Request $request)
    {
        $rules = array(
            'title'         => 'required',
            //'description'   => 'required',
            'language'      => 'required',
            'path'          => 'required',
        );

        $messages = [
            'title.required'        => __('name_required'),
            'description.required'  => __('description_page_required'),
            'language.required'     => __('language_required'),
            'path.required'         => __('path_required'),
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            // update post data
            $page = PagesModel::findOrFail($request->id);

            $page->update($request->all());

            // Save the changes
            $page->save();

            return back()->with(['success' => __('updated_successfuly')]);
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

    public function delete(PagesModel $page)
    {
        $page->delete();
        return redirect()->route('admin.page.list')->with('success', 'Post Deleted successfully!');
    }


    public function restore(Request $request)
    {
        $id   = $request->id;
        $page = PagesModel::withTrashed()->find($id);

        if ($page->trashed()) {
            if ($page) {
                $page->restore();
                // Optionally, you can add a success message or redirect the user
                return redirect()->back()->with('success', 'User restored successfully!');
            }
        }
    }
}
