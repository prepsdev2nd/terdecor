<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banner.index');
    }

    public function getData()
    {
        $data = Banner::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<div class="btn-group"><a href="' . route('admin.banner.edit', $data->id) . '" class="btn btn-sm btn-warning"><i data-feather="edit"></i></a><button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.banner.delete', $data->id) . '`)"><i data-feather="trash-2"></i></button></div>';
            })
            ->editColumn('image', function ($data) {
                return '<img src="' . asset('images/banners/' . $data->image_path) . '" alt="' . e($data->alt) . '" style="max-height: 150px; max-width: 50px;">';
            })->editColumn('image_mobile', function ($data) {
                return '<img src="' . asset('images/banners/' . $data->image_path_mobile) . '" alt="' . e($data->alt) . '" style="max-height: 75px; max-width: 75px;">';
            })
            ->rawColumns(['action', 'image', 'image_mobile'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alt' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'image_mobile' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'url' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/banners'), $imageName);
        }

        if ($request->hasFile('image_mobile')) {
            $imageNameMobile = time() . '.' . $request->image_mobile->extension();
            $request->image_mobile->move(public_path('images/banners'), $imageNameMobile);
        }

        $data = new Banner();
        $data->image_path = $imageName ?? null;
        $data->image_path_mobile = $imageNameMobile ?? null;
        $data->alt = $request->input('alt');
        $data->url = $request->input('url');

        $data->save();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Banner::findOrFail($id);

        return view('admin.banner.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alt' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image_mobile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'url' => 'required',
        ]);

        $data = Banner::where('id', $id)->first();

        if ($request->hasFile('image')) {
            if ($data->image_path && file_exists(public_path('images/banners/' . $data->image_path))) {
                unlink(public_path('images/banners/' . $data->image_path));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/banners'), $imageName);
            $data->image_path = $imageName;
        }

        if ($request->hasFile('image_mobile')) {
            if ($data->image_path_mobile && file_exists(public_path('images/banners/' . $data->image_path_mobile))) {
                unlink(public_path('images/banners/' . $data->image_path_mobile));
            }

            $imageNameMobile = time() . '.' . $request->image_mobile->extension();
            $request->image_mobile->move(public_path('images/banners'), $imageNameMobile);
            $data->image_path_mobile = $imageNameMobile;
        }

        $data->url = $request->input('url');
        $data->alt = $request->input('alt');

        $data->save();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diperbarui.');
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
