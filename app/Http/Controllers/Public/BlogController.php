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
        $posts      = $query->paginate(18);
        $active     = 'blog';
        return view('public.posts.list', compact('posts', 'sum', 'active'));
    }

    public function post(Request $request)
    {
        $post = PostsModel::with('image', 'auther')->find($request->id);

        if ($post == null) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        $related_posts = PostsModel::inRandomOrder()
        ->limit(3)
        ->get();

        $page['title'] = $post->seo_title;
        $page['description'] = $post->seo_description;
        $page = (object)$page;

        return view('public.posts.post', compact('post', 'related_posts', 'page'));
    }


    public function like(Request $request, PostsModel $post)
    {
        $likes = $request->session()->get('liked_posts', []);

        if (!in_array($post->id, $likes)) {
            $post->increment('likes');
            $likes[] = $post->id;
            $request->session()->put('liked_posts', $likes);
        }

        return response()->json(['likes' => $post->likes]);
    }

    public function unlike(Request $request, PostsModel $post)
    {
        $likes = $request->session()->get('liked_posts', []);

        if (($key = array_search($post->id, $likes)) !== false) {
            $post->decrement('likes');
            unset($likes[$key]);
            $request->session()->put('liked_posts', $likes);
        }

        return response()->json(['likes' => $post->likes]);
    }
}
