<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyUserController extends Controller
{

    public function form()
    {
        return view('testimony');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $data = new Testimony();
        $data->name = $request->input('name');
        if (request()->has('typeUnit')) {
            $data->type = $request->input('typeUnit');
            $data->testi = $request->input('description');
        } else {
            $data->type = $request->input('type');
            $data->testi = $request->input('testi');
        }
        $data->status = 'Draft';

        $data->save();

        return redirect()->route('home')->with('success', 'Testimoni berhasil ditambahkan.<br>Terima kasih telah meluangkan waktu untuk memberikan testimonial pada kami!');
    }
}
