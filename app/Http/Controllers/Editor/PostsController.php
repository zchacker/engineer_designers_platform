<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\FilesModel;
use App\Models\PostsModel;
use Google\Service\Blogger\Resource\Posts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{

    public function list(Request $request)
    {
        $query      = PostsModel::orderByDesc('created_at')->where('type', 'post')->where('auther_id', $request->user()->id);
        $sum        = $query->count('id');
        $posts      = $query->paginate(100);
        return view('editor.posts.list', compact('posts', 'sum'));
    }

    public function upload(Request $request)
    {
        $rules = array(
            'file' => 'required|mimes:jpeg,png,jpg,webp|image|max:7000',
        );

        $messages = [
            'file.mimes' => __('images_image'),
            'file.max'   => __('images_max', ['size' => '7']),
            'file.image' => __('images_image'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == true) {

            $error     = $validator->errors();
            $allErrors = "";

            foreach ($error->all() as $err) {
                $allErrors .= $err . " <br/>";
            }

            return response(json_encode([
                'error' => $allErrors
            ]), Response::HTTP_BAD_REQUEST);
        } else {

            if ($request->hasFile('file')) {
                $file_hash = hash_file('sha256', $request->file->getRealPath());
                $fileDB    = FilesModel::where(['hash' => $file_hash])->first();

                if ($fileDB == null) {

                    $url = $request->file('file')->storePublicly(
                        "avatar/images",
                        $this->basicStorage
                    );

                    if ($url == true) // file stored successfully
                    {
                        $file_added = FilesModel::create([
                            'fileName'       => $url,
                            'hash'           => $file_hash,
                            'storage_driver' => $this->basicStorage
                        ]);

                        $url = $file_added->fileName;

                        return response(json_encode([
                            'location' => $url,
                        ]), Response::HTTP_OK);
                    }
                } else {

                    $url = $fileDB->fileName;

                    return response(json_encode([
                        'location' => $url,
                    ]), Response::HTTP_OK);
                }
            } else {

                return response(json_encode([
                    'error' => 'No image'
                ]), Response::HTTP_BAD_REQUEST);
            }
        }
    }

    public function create(Request $request)
    {

        $post = PostsModel::create([
            'title'     => '',
            'body'      => '',
            'auther_id' => $request->user()->id,
            'type'      => 'post',
            'status'    => 'draft'
        ]);

        return redirect()->route('editor.post.create.view', ['post' => $post->id]);
        // return view('editor.posts.create' , compact('post'));

    }

    public function view_create_form(Request $request, PostsModel $post)
    {
        return view('editor.posts.create', compact('post'));
    }

    public function create_action(Request $request, PostsModel $post)
    {
        $rules = array(
            'title'                     => 'required',
            'body'                      => 'required',
            'slug'                      => 'required',
            'language'                  => 'required',
            'keywords'                  => 'required',
            'seo_title'                 => 'required',
            'seo_description'           => 'required',
            'cover_image'               => 'mimes:jpeg,png,jpg,gif,svg,webp|image|max:25000',
        );

        $messages = [
            'title.required'            => __('name_required'),
            'body.required'             => __('email_required'),
            'slug.required'             => __('slug_required'),
            'language.required'         => __('language_required'),
            'keywords.required'         => __('keywords_required'),
            'seo_title.required'        => __('seo_title_required'),
            'seo_description.required'  => __('seo_description_required'),
            'cover_image.mimies'        => __('images_mimies'),
            'cover_image.image'         => __('images_image'),
            'cover_image.max'           => __('images_max', ["size" => "20"]),
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            // if upload cover image
            if ($request->has('cover_image_file')) {
                $file_hash = hash_file('sha256', $request->file('cover_image_file')->getRealPath());
                $fileDB    = FilesModel::where(['hash' => $file_hash])->first();

                if ($fileDB == null) {
                    $url = $request->file('cover_image_file')->storePublicly(
                        "avatar/images",
                        $this->basicStorage
                    );

                    if ($url == true) // file stored successfully
                    {
                        $file_added = FilesModel::create([
                            'fileName' => $url,
                            'hash' => $file_hash,
                            'storage_driver' => $this->basicStorage
                        ]);


                        $request->merge(['cover_image' => $file_added->id]);
                        $request->except('cover_image_file');
                    }
                } else {
                    $request['slug'] = str_replace(' ', '-', $request->slug);

                    // assgin old file
                    $request->merge(['cover_image' => $fileDB->id]);
                    $request->except('cover_image_file');
                }
            }

            // Define the allowed HTML tags
            $allowedTags = '<p><a><br><strong><h1><h2><h3><h4><h5><h6><img>[cta_btn]';
            $clean_body = strip_tags($request->body, $allowedTags);
            $request->merge(['body' => $clean_body]);

            $request['slug'] = str_replace(' ', '-', $request->slug);
            $request->merge(['auther_id' => auth()->user()->id]);
            $request->merge(['status' => 'published']);

            // create user account
            //$post = PostsModel::create($request->all());            
            $post = $post->update($request->all());

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

    public function autosave(Request $request, PostsModel $post)
    {

        // Define the allowed HTML tags
        $allowedTags = '<p><a><br><strong><h1><h2><h3><h4><h5><h6><img>[cta_btn]';
        $clean_body = strip_tags($request->body, $allowedTags);
        $request->merge(['body' => $clean_body]);

        // if upload cover image
        if ($request->has('cover_image_file')) {
            $file_hash = hash_file('sha256', $request->file('cover_image_file')->getRealPath());
            $fileDB    = FilesModel::where(['hash' => $file_hash])->first();

            if ($fileDB == null) {
                $url = $request->file('cover_image_file')->storePublicly(
                    "avatar/images",
                    $this->basicStorage
                );

                if ($url == true) // file stored successfully
                {
                    $file_added = FilesModel::create([
                        'fileName' => $url,
                        'hash' => $file_hash,
                        'storage_driver' => $this->basicStorage
                    ]);


                    $request->merge(['cover_image' => $file_added->id]);
                    $request->except('cover_image_file');
                }
            } else {
                $request['slug'] = str_replace(' ', '-', $request->slug);

                // assgin old file
                $request->merge(['cover_image' => $fileDB->id]);
                $request->except('cover_image_file');
            }
        }

        $request->merge(['status' => 'draft']);

        $post->update($request->all());

        return response()->json(['message' => __('saved_successfuly')]);
    }

    public function edit(Request $request)
    {

        $post = PostsModel::where('id', $request->id)->first();

        if ($post == null) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        return view('editor.posts.edit', compact('post'));
    }

    public function edit_action(Request $request)
    {

        $rules = array(
            'title'            => 'required',
            'body'             => 'required',
            'slug'             => 'required',
            'language'         => 'required',
            'keywords'         => 'required',
            'seo_title'        => 'required',
            'seo_description'  => 'required',
            'cover_image'      => 'mimes:jpeg,png,jpg,gif,svg,webp|image|max:25000',
        );

        $messages = [
            'title.required'            => 'العنوان مطلوب',
            'body.required'             => 'المقالة مطلوبة',
            'slug.required'               => 'الاسم في رابط المقالة مطلوب',
            'language.required'         => 'اللغة مطلوبة',
            'keywords.required'           => 'الكلمات المفتاحية مطلوبة',
            'seo_title.required'        => 'عنوان SEO مطلوب',
            'seo_description.required'  => 'وصف SEO مطلوب',
            'cover_image.mimies'        => __('images_mimies'),
            'cover_image.image'         => __('images_image'),
            'cover_image.max'           => __('images_max', ["size" => "20"]),
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            // if upload cover image
            if ($request->has('cover_image_file')) {
                $file_hash = hash_file('sha256', $request->file('cover_image_file')->getRealPath());
                $fileDB    = FilesModel::where(['hash' => $file_hash])->first();

                if ($fileDB == null) {
                    $url = $request->file('cover_image_file')->storePublicly(
                        "avatar/images",
                        $this->basicStorage
                    );

                    if ($url == true) // file stored successfully
                    {
                        $file_added = FilesModel::create([
                            'fileName' => $url,
                            'hash' => $file_hash,
                            'storage_driver' => $this->basicStorage
                        ]);


                        $request->merge(['cover_image' => $file_added->id]);
                        $request->except('cover_image_file');
                    }
                } else {
                    $request['slug'] = str_replace(' ', '-', $request->slug);

                    // assgin old file
                    $request->merge(['cover_image' => $fileDB->id]);
                    $request->except('cover_image_file');
                }
            }

            $request['slug'] = str_replace(' ', '-', $request->slug);
            $request->merge(['auther_id' => auth()->user()->id]);
            $request->merge(['status' => 'published']);

            // update post data
            $post = PostsModel::findOrFail($request->id);

            // Define the allowed HTML tags
            $allowedTags = '<p><a><br><strong><h1><h2><h3><h4><h5><h6><img>[cta_btn]';
            $clean_body = strip_tags($request->body, $allowedTags);
            $request->merge(['body' => $clean_body]);

            $post->update($request->all());

            // Save the changes
            $post->save();

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

    public function delete(PostsModel $post)
    {
        $post->delete();
        return redirect()->route('editor.post.list')->with('success', 'Post Deleted successfully!');
    }

    public function restore(Request $request)
    {
        $id   = $request->id;
        $post = PostsModel::withTrashed()->find($id);

        if ($post->trashed()) {
            if ($post) {
                $post->restore();
                // Optionally, you can add a success message or redirect the user
                return redirect()->back()->with('success', 'User restored successfully!');
            }
        }
    }
}
