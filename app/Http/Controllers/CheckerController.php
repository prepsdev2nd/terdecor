<?php

namespace App\Http\Controllers;

use App\Models\Checker;
use App\Models\Quality;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CheckerController extends Controller
{
    public function index()
    {
        $quality = Quality::all();
        return view('admin.checker.index', compact('quality'));
    }

    public function getData()
    {
        $data = Checker::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<div class="btn-group"><a href="' . route('admin.checker.edit', $data->id) . '" class="btn btn-sm btn-warning"><i data-feather="edit"></i></a><button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.banner.delete', $data->id) . '`)"><i data-feather="trash-2"></i></button></div>';
            })
            ->editColumn('kualitas', function ($data) {
                return $data->kualitas ? $data->kualitas->nama : 'Tidak ada';
            })
            ->editColumn('harga', function ($data) {
                return $data->kualitas ? 'Rp ' . number_format($data->kualitas->harga, 0, ',', '.') : 'Rp 0,00';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getDataQuality()
    {
        $data = Quality::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<div class="btn-group"><button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.quality.delete', $data->id) . '`)"><i data-feather="trash-2"></i></button></div>';
            })
            ->editColumn('harga', function ($data) {
                return $data->harga;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $quality = Quality::all();
        return view('admin.checker.create', compact('quality'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
            'kategori' => 'required',
            'kualitas' => 'required',
        ]);

        $data = new Checker();
        $data->jenis = $request->input('jenis');
        $data->kategori = $request->input('kategori');
        $data->id_kualitas = $request->input('kualitas');

        $data->save();

        return redirect()->route('admin.checker.index')->with('success', 'Checker berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Checker::findOrFail($id);
        $quality = Quality::all();

        return view('admin.checker.edit', compact('data', 'quality'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
            'kategori' => 'required',
            'kualitas' => 'required',
        ]);

        $data = Checker::where('id', $id)->first();

        $data->jenis = $request->input('jenis');
        $data->kategori = $request->input('kategori');
        $data->id_kualitas = $request->input('kualitas');

        $data->save();

        return redirect()->route('admin.checker.index')->with('success', 'Checker berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Banner::where('id', $id)->first();

        if ($data->image_path && file_exists(public_path('images/banners/' . $data->image_path))) {
            unlink(public_path('images/banners/' . $data->image_path));
        }
        if ($data->image_path_mobile && file_exists(public_path('images/banners/' . $data->image_path_mobile))) {
            unlink(public_path('images/banners/' . $data->image_path_mobile));
        }

        $data->delete();

        return response()->json(['warning' => 'Banner berhasil dihapus.']);
    }
}
