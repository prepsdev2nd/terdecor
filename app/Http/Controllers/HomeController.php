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
        return view('home', compact('testi', 'package', 'design', 'blog', 'banner'));
    }

    public function paket($id)
    {
        $data = Package::where('id', $id)->first();
        return view('paket', compact('data'));
    }
}
