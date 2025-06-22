<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TestimonyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.testimony.index');
    }

    public function getData()
    {
        $data = Testimony::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<div class="btn-group"><a href="' . route('admin.testimony.edit', $data->id) . '" class="btn btn-sm btn-warning"><i data-feather="edit"></i></a><button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.testimony.delete', $data->id) . '`)"><i data-feather="trash-2"></i></button></div>';
            })
            ->editColumn('status', function ($data) {
                if ($data->status == "Published") {
                    $status = '<span class="badge bg-success">' . $data->status . '</span>';
                } else {
                    $status = '<span class="badge bg-secondary">' . $data->status . '</span>';
                }

                return $status;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.testimony.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'testi' => 'required|string|max:255',
        ]);

        $data = new Testimony();
        $data->name = $request->input('name');
        $data->type = $request->input('type');
        $data->testi = $request->input('testi');
        $data->status = $request->input('status') ? 'Published' : 'Draft';

        $data->save();

        return redirect()->route('admin.testimony.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Testimony::findOrFail($id);

        return view('admin.testimony.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'testi' => 'required|string|max:255',
        ]);

        $data = Testimony::where('id', $id)->first();


        $data->name = $request->input('name');
        $data->type = $request->input('type');
        $data->testi = $request->input('testi');
        $data->phone = $request->input('phone');
        $data->status = $request->input('status') ? 'Published' : 'Draft';

        $data->save();

        return redirect()->route('admin.testimony.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Testimony::where('id', $id)->first();

        $data->delete();

        return response()->json(['warning' => 'Data berhasil dihapus.']);
    }
}
