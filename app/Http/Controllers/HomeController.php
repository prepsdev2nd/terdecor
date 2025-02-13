<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Design;
use App\Models\Package;
use App\Models\Testimony;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $testi = Testimony::where('status', 'Published')->get();
        $package = Package::with(['images', 'details'])->orderBy('updated_at', 'desc')->get();
        $design = Design::with(['images'])->orderBy('updated_at', 'desc')->take(3)->get();
        $blog = Blog::orderBy('updated_at', 'desc')->take(3)->get();
        $banner = Banner::orderBy('updated_at', 'desc')->get();
        $title = 'Bisa Bikin Ruanganmu dari Red Flag jadi Green Flag';
        return view('home', compact('testi', 'package', 'design', 'blog', 'banner', 'title'));
    }

    public function paket()
    {
        $data = Package::with(['images', 'details'])->orderBy('updated_at', 'desc')->paginate(10);
        $title = 'Paket';

        return view('paket', compact('data', 'title'));
    }


    public function paketDetail($id)
    {
        $data = Package::with(['images', 'details'])->where('slug', $id)->first();
        $title = $data->title;
        $description = strip_tags($data->description);
        $keywords = $data->title;

        return view('paketDetail', compact('data', 'title', 'description', 'keywords'));
    }

    public function desain()
    {
        $data = Design::with(['images'])->orderBy('updated_at', 'desc')->paginate(10);
        $title = 'Desain';

        return view('desain', compact('data', 'title'));
    }


    public function desainDetail($id)
    {
        $data = Design::with(['images'])->where('slug', $id)->first();
        $title = $data->title;
        $description = strip_tags($data->description);
        $keywords = $data->title;

        return view('desainDetail', compact('data', 'title', 'description', 'keywords'));
    }

    public function blog()
    {
        $data = Blog::orderBy('updated_at', 'desc')->paginate(10);
        $title = 'Blog';

        return view('blog', compact('data', 'title'));
    }

    public function blogDetail($id)
    {
        $data = Blog::where('slug', $id)->first();
        $title = $data->title;
        $description = strip_tags($data->content);
        $keywords = $data->tags;

        $tags = explode('; ', $data->tags);

        $relatedBlogs = Blog::where('id', '!=', $data->id)
            ->where(function ($query) use ($tags) {
                foreach ($tags as $tag) {
                    $query->orWhere('tags', 'LIKE', "%$tag%");
                }
            })
            ->limit(3)
            ->get();
        if ($relatedBlogs->isEmpty()) {
            $relatedBlogs = Blog::where('id', '!=', $data->id)->limit(3)->get();
        }

        return view('blogDetail', compact('data', 'title', 'relatedBlogs', 'description', 'keywords'));
    }
}
