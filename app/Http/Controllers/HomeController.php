<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Testimony;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $testi = Testimony::where('status', 'Published')->get();
        $package = Package::orderBy('updated_at', 'desc')->get();
        return view('home', compact('testi', 'package'));
    }
}
