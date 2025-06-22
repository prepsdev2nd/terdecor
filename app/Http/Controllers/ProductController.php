<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function getData()
    {
        $data = Product::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<div class="btn-group"><a href="' . route('admin.product.edit', $data->id) . '" class="btn btn-sm btn-warning"><i data-feather="edit"></i></a><button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.product.delete', $data->id) . '`)"><i data-feather="trash-2"></i></button></div>';
            })
            ->editColumn('image', function ($data) {
                return '<img src="' . asset('images/products/' . $data->image) . '" alt="' . e($data->name) . '" style="max-height: 250px; max-width: 250px;">';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
        }

        $data = new Product();
        $data->image = $imageName ?? null;
        $data->name = $request->input('name');

        $data->save();

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);

        return view('admin.product.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = Product::where('id', $id)->first();

        if ($request->hasFile('image')) {
            if ($data->image && file_exists(public_path('images/products/' . $data->image))) {
                unlink(public_path('images/products/' . $data->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
            $data->image = $imageName;
        }

        $data->name = $request->input('name');

        $data->save();

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Product::where('id', $id)->first();

        if ($data->image && file_exists(public_path('images/products/' . $data->image))) {
            unlink(public_path('images/products/' . $data->image));
        }

        $data->delete();

        return response()->json(['warning' => 'Produk berhasil dihapus.']);
    }
}
