<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PostsModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{

    public function list(Request $requests)
    {
        $query      = PostsModel::orderByDesc('created_at')->where('type', 'post')->where('status', 'published');
        if (app()->getLocale() == 'ar') {
            $query->where('language', 'ar');
        } else {
            $query->where('language', 'en');
        }
        $sum        = $query->count('id');
        $posts      = $query->paginate(20);
        $active     = 'blog';
        return view('public.posts.list', compact('posts', 'sum', 'active'));
    }

    public function post(Request $request)
    {
        $post = PostsModel::with('image', 'auther')->find($request->id);

        if ($post == null) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        $page['title'] = $post->seo_title;
        $page['description'] = $post->seo_description;
        $page = (object)$page;

        return view('public.posts.post', compact('post', 'page'));
    }
}
