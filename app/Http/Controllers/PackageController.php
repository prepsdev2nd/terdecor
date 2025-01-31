<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageDetails;
use App\Models\PackageImages;
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
        $data = Package::with(['images', 'details'])->orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<div class="btn-group"><a href="' . route('admin.package.edit', $data->id) . '" class="btn btn-sm btn-warning"><i data-feather="edit"></i></a><button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.package.delete', $data->id) . '`)"><i data-feather="trash-2"></i></button></div>';
            })
            ->editColumn('price', function ($data) {
                return 'Rp. ' . number_format($data->price, 0, ',', '.');
            })
            ->editColumn('image', function ($data) {
                $image = $data->images->where('image_type', 'Image')->first();

                if ($image) {
                    return '<img src="' . asset($image->image_path) . '" alt="Image" class="img-thumbnail" width="150">';
                } else {
                    return '<span>No image</span>';
                }
            })
            ->editColumn('list', function ($data) {
                $titles = $data->details->pluck('title')->toArray();

                $return = '<ul class="list-unstyled">';
                foreach ($titles as $title) {
                    $return .= '<li>' . $title . '</li>';
                }
                $return .= '</ul>';

                return $return;
            })

            ->rawColumns(['action', 'image', 'list'])
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
            'videos.*' => 'nullable|string|url', // Ensure video URLs are valid
        ]);

        // Handle price formatting
        $price = str_replace('.', '', str_replace('Rp. ', '', $request->input('price')));

        // Create the package
        $package = new Package();
        $package->title = $request->input('title');
        $package->slug = Str::slug($request->input('title'));
        $package->description = $request->input('content');
        $package->price = (int) $price;
        $package->save();

        $images = $request->file('images');
        if ($images) {
            foreach ($images as $image) {
                $filename = time() . '-' . $image->getClientOriginalName();
                $destinationPath = public_path('images/packages');
                $image->move($destinationPath, $filename);

                PackageImages::create([
                    'package_id' => $package->id,
                    'image_path' => 'images/packages/' . $filename,
                    'image_type' => 'Image',
                ]);
            }
        }

        $videos = $request->input('videos');
        if ($videos) {
            foreach ($videos as $videoUrl) {
                if (!empty($videoUrl)) {
                    PackageImages::create([
                        'package_id' => $package->id,
                        'image_path' => $videoUrl,
                        'image_type' => 'Video',
                    ]);
                }
            }
        }

        $lists = $request->input('list');
        if ($lists) {
            foreach ($lists as $list) {
                PackageDetails::create([
                    'package_id' => $package->id,
                    'title' => $list,
                ]);
            }
        }

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
            'title' => 'required|string|max:255'
        ]);

        $package = Package::where('id', $id)->first();
        $existingImages = explode(';', $package->images);
        $newImageNames = [];

        if ($request->hasFile('images')) {
            $uploadedImages = $request->file('images');

            if (!is_array($uploadedImages)) {
                $uploadedImages = [$uploadedImages];
            }

            foreach ($uploadedImages as $image) {
                $filename = time() . '-' . uniqid() . '-' . $image->getClientOriginalName();
                $destinationPath = public_path('images/packages');
                $image->move($destinationPath, $filename);
                $newImageNames[] = $filename;
            }
        }

        $removedImages = $request->input('removed_images', []); // Array of filenames to remove
        $existingImages = array_filter($existingImages, function ($image) use ($removedImages) {
            return !in_array($image, $removedImages) && !empty($image);
        });

        $finalImages = array_merge($existingImages, $newImageNames);
        $finalImages = array_filter($finalImages);

        $price = str_replace('.', '', str_replace('Rp. ', '', $request->input('price')));

        $package->title = $request->input('title');
        $package->slug = Str::slug($request->input('title'));
        $package->description = $request->input('content');
        $package->price = (int) $price;
        $package->image = implode(';', $finalImages);

        $package->save();

        return redirect()->route('admin.package.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $package = Package::where('id', $id)->first();

        // if ($blog->image && file_exists(public_path('images/packages/' . $package->image))) {
        //     package(public_path('images/packages/' . $package->image));
        // }

        $package->delete();

        return response()->json(['warning' => 'Paket berhasil dihapus.']);
    }
}
