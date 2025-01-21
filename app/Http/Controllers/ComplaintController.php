<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.complaint.index');
    }

    public function getData()
    {
        $data = Complaint::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<div class="btn-group"><button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.complaint.delete', $data->id) . '`)"><i data-feather="trash-2"></i></button></div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function destroy($id)
    {
        $data = Complaint::where('id', $id)->first();

        $data->delete();

        return response()->json(['warning' => 'Data berhasil dihapus.']);
    }

    public function userstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $data = new Complaint();
        $data->name = $request->input('name');
        $data->description = $request->input('description');

        $data->save();

        return redirect()->route('home')->with('success', 'Kritik atau Saran berhasil ditambahkan.<br>Terima kasih telah meluangkan waktu untuk memberikan masukan kepada kami!');
    }
}
