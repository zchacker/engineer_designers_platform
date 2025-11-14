<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;
use App\Models\PostsModel; // adjust to your blog model
use App\Models\ServicesModel;    // adjust to your services model
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [];

        // Static pages
        $urls[] = ['loc' => route('home'), 'lastmod' => Carbon::now()->toAtomString()];
        $urls[] = ['loc' => route('about'), 'lastmod' => Carbon::now()->toAtomString()];
        $urls[] = ['loc' => route('services'), 'lastmod' => Carbon::now()->toAtomString()];
        $urls[] = ['loc' => route('projects'), 'lastmod' => Carbon::now()->toAtomString()];        
        $urls[] = ['loc' => route('contact-us'), 'lastmod' => Carbon::now()->toAtomString()];
        $urls[] = ['loc' => route('blog.list'), 'lastmod' => Carbon::now()->toAtomString()];
        $urls[] = ['loc' => route('privacy'), 'lastmod' => Carbon::now()->toAtomString()];
        $urls[] = ['loc' => route('terms'), 'lastmod' => Carbon::now()->toAtomString()];

        $urls[] = ['loc' => route('home' , 'en'), 'lastmod' => Carbon::now()->toAtomString()];
        $urls[] = ['loc' => route('about' , 'en'), 'lastmod' => Carbon::now()->toAtomString()];
        $urls[] = ['loc' => route('services' , 'en'), 'lastmod' => Carbon::now()->toAtomString()];
        $urls[] = ['loc' => route('projects' , 'en'), 'lastmod' => Carbon::now()->toAtomString()];        
        $urls[] = ['loc' => route('contact-us' , 'en'), 'lastmod' => Carbon::now()->toAtomString()];
        $urls[] = ['loc' => route('blog.list' , 'en'), 'lastmod' => Carbon::now()->toAtomString()];
        $urls[] = ['loc' => route('privacy' , 'en'), 'lastmod' => Carbon::now()->toAtomString()];
        $urls[] = ['loc' => route('terms' , 'en'), 'lastmod' => Carbon::now()->toAtomString()];
        
        // Blog posts
        $posts = PostsModel::all();
        foreach ($posts as $post) {
            $urls[] = [
                'loc' => urldecode( route('blog.post', ['id' => $post->id, 'title' => $post->slug ?? '']) ),
                'lastmod' => $post->updated_at ? $post->updated_at->toAtomString() : Carbon::now()->toAtomString()
            ];
        }

        // Services
        $services = ServicesModel::all();
        foreach ($services as $service) {
            $urls[] = [
                'loc' => urldecode( route('services.details', ['id' => $service->id, 'name' => $service->slug_ar ?? '']) ),
                'lastmod' => $service->updated_at ? $service->updated_at->toAtomString() : Carbon::now()->toAtomString()
            ];
        }

        foreach ($services as $service) {
            $urls[] = [
                'loc' => urldecode( route('services.details', ['en' , 'id' => $service->id, 'name' => $service->slug_en ?? '']) ),
                'lastmod' => $service->updated_at ? $service->updated_at->toAtomString() : Carbon::now()->toAtomString()
            ];
        }

        // XML Output
        $content = view('sitemap', compact('urls'));
        return Response::make($content, 200)->header('Content-Type', 'application/xml');
    }
}
