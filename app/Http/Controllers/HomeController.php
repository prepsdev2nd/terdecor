<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $testi = Testimony::where('status', 'Published')->get();
        return view('home', compact('testi'));
    }
}
