<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $data = new Complaint();
        $data->name = $request->input('name');
        $data->phone = $request->input('phone');
        $data->description = $request->input('description');

        $data->save();

        return redirect()->route('home')->with('success', 'Kritik atau Saran berhasil ditambahkan.<br>Terima kasih telah meluangkan waktu untuk memberikan masukan kepada kami!');
    }
}
