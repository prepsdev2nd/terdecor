<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Checker;
use App\Models\Design;
use App\Models\GlobalPackage;
use App\Models\Package;
use App\Models\Product;
use App\Models\Quality;
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
        $globalPackage = GlobalPackage::orderBy('updated_at', 'desc')->get();
        $jenis = Checker::select('jenis')->distinct()->get();
        $produk = Product::orderBy('updated_at', 'desc')->get();
        return view('home', compact('testi', 'package', 'design', 'blog', 'banner', 'title', 'jenis', 'globalPackage', 'produk'));
    }

    public function jasa($model)
    {
        $data = Package::with(['images', 'details'])->orderBy('updated_at', 'desc')
            ->where('type', $model)
            ->get();
        return view('jasa-list', compact('data'));
    }

    public function package($slug)
    {
        $data = Package::with(['images', 'details'])->where('slug', $slug)->firstOrFail();
        return view('jasa-detail', compact('data'));
    }

    public function blog()
    {
        $data = Blog::orderBy('updated_at', 'desc')->paginate(10);
        $title = 'Blog';

        return view('blog-list', compact('data', 'title'));
    }

    public function read($id)
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

        return view('blog-detail', compact('data', 'title', 'relatedBlogs', 'description', 'keywords'));
    }

    public function getKategoriByJenis($jenis)
    {
        $kategori = Checker::where('jenis', $jenis)->pluck('kategori')->unique();
        return response()->json($kategori);
    }

    public function getQualityByJenisKategori($jenis, $kategori)
    {
        $checker = Checker::where('jenis', $jenis)->where('kategori', $kategori)->first();
        if (!$checker) return response()->json([]);

        $quality = Quality::find($checker->id_kualitas);
        if (!$quality) return response()->json([]);

        return response()->json(['id' => $quality->id, 'nama' => $quality->nama, 'harga' => $quality->harga]);
    }
}
