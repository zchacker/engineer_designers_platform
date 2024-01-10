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
        $query      = PostsModel::orderByDesc('created_at')->where('type', 'post');
        $sum        = $query->count('id');
        $posts      = $query->paginate(20);
        return view('public.posts.list', compact('posts','sum'));
    }

    public function post(Request $request)
    {
        $post = PostsModel::find($request->id);

        if($post == null)
        {
            return abort(Response::HTTP_NOT_FOUND);
        }

        $page['title'] = $post->seo_title;
        $page['description'] = $post->seo_description;
        $page = (object)$page;
        
        return view('public.posts.post', compact('post','page'));
    }

}
