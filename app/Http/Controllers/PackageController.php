<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.package.index');
    }

    public function getData()
    {
        $data = Package::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<div class="btn-group"><a href="' . route('admin.package.edit', $data->id) . '" class="btn btn-sm btn-warning"><i data-feather="edit"></i></a><button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.package.delete', $data->id) . '`)"><i data-feather="trash-2"></i></button></div>';
            })
            ->editColumn('range', function ($data) {
                return 'Rp. ' . number_format($data->lowest_price, 0, ',', '.') . ' - Rp. ' . number_format($data->highest_price, 0, ',', '.');
            })
            ->editColumn('image', function ($data) {
                return '<img src="' . asset('images/packages/' . $data->image) . '" alt="' . e($data->title) . '" style="max-height: 150px; max-width: 150px;">';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.package.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/packages'), $imageName);
        }

        $lowestPrice = str_replace('.', '', str_replace('Rp. ', '', $request->input('lowest_price')));
        $highestPrice = str_replace('.', '', str_replace('Rp. ', '', $request->input('highest_price')));

        $data = new Package();
        $data->title = $request->input('title');
        $data->slug = Str::slug($request->input('title'));
        $data->image = $imageName ?? null;
        $data->description = $request->input('content');
        $data->lowest_price = (int) $lowestPrice;
        $data->highest_price = (int) $highestPrice;

        $data->save();

        return redirect()->route('admin.package.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Package::findOrFail($id);

        return view('admin.package.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = Package::where('id', $id)->first();

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path('images/packages/' . $blog->image))) {
                unlink(public_path('images/packages/' . $blog->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/packages'), $imageName);
            $blog->image = $imageName;
        }

        $blog->title = $request->input('title');
        $blog->slug = Str::slug($request->input('title'));
        $blog->content = $request->input('content');
        $blog->tags = implode(', ', $request->input('tags'));
        $blog->status = $request->input('status') ? 'Aktif' : 'Tidak Aktif';

        $blog->save();

        return redirect()->route('admin.package.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $blog = Package::where('id', $id)->first();

        if ($blog->image && file_exists(public_path('images/packages/' . $blog->image))) {
            unlink(public_path('images/packages/' . $blog->image));
        }

        $blog->delete();

        return response()->json(['warning' => 'Paket berhasil dihapus.']);
    }
}
