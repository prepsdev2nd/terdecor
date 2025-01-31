<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\DesignImages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DesignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.design.index');
    }

    public function getData()
    {
        $data = Design::with(['images'])->orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<div class="btn-group"><a href="' . route('admin.design.edit', $data->id) . '" class="btn btn-sm btn-warning"><i data-feather="edit"></i></a><button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.design.delete', $data->id) . '`)"><i data-feather="trash-2"></i></button></div>';
            })
            ->editColumn('description', function ($data) {
                return $data->description;
            })
            ->editColumn('tags', function ($data) {
                $tags = explode(', ', $data->tags);

                return collect($tags)->map(function ($tag) {
                    return '<span class="badge bg-purple-soft text-purple">' . e($tag) . '</span>';
                })->implode(' ');
            })
            ->editColumn('style', function ($data) {
                return $data->material . ' - ' . $data->type;
            })
            ->editColumn('image', function ($data) {
                $image = $data->images->where('image_type')->first();

                if ($image) {
                    return '<img src="' . asset($image->image_path) . '" alt="Image" class="img-thumbnail" width="150">';
                } else {
                    return '<span>No image</span>';
                }
            })
            ->rawColumns(['action', 'description', 'image', 'tags'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.design.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'tags' => 'required',
            'price' => 'required',
            'type' => 'required',
            'material' => 'required'
        ]);


        $price = str_replace('.', '', str_replace('Rp. ', '', $request->input('price')));

        $data = new Design();
        $data->title = $request->input('title');
        $data->slug = Str::slug($request->input('title'));
        $data->price = (int) $price;
        $data->type = $request->input('type');
        $data->material = $request->input('material');
        $data->description = $request->input('description');
        $data->content = $request->input('content');
        $data->tags = implode(', ', $request->input('tags'));

        $data->save();

        $images = $request->file('images');
        if ($images) {
            foreach ($images as $image) {
                $filename = time() . '-' . $image->getClientOriginalName();
                $destinationPath = public_path('images/designs');
                $image->move($destinationPath, $filename);

                DesignImages::create([
                    'design_id' => $data->id,
                    'image_path' => 'images/designs/' . $filename,
                    'image_type' => 'Image',
                ]);
            }
        }

        $videos = $request->input('videos');
        if ($videos) {
            foreach ($videos as $videoUrl) {
                if (!empty($videoUrl)) {
                    DesignImages::create([
                        'design_id' => $data->id,
                        'image_path' => $videoUrl,
                        'image_type' => 'Video',
                    ]);
                }
            }
        }

        return redirect()->route('admin.design.index')->with('success', 'Design berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Design::findOrFail($id);

        return view('admin.design.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pic1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pic2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pic3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pic4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pic5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'required',
        ]);

        $design = Design::where('id', $id)->first();


        if ($request->hasFile('pic1')) {
            if ($design->pic1 && file_exists(public_path('images/designs/' . $design->pic1))) {
                unlink(public_path('images/designs/' . $design->pic1));
            }

            $imageName1 = time() . '.' . $request->image->extension();
            $request->pic1->move(public_path('images/designs'), $imageName1);
        }

        if ($request->hasFile('pic2')) {
            if ($design->pic2 && file_exists(public_path('images/designs/' . $design->pic2))) {
                unlink(public_path('images/designs/' . $design->pic2));
            }

            $imageName2 = time() . '.' . $request->image->extension();
            $request->pic2->move(public_path('images/designs'), $imageName2);
        }

        if ($request->hasFile('pic3')) {
            if ($design->pic3 && file_exists(public_path('images/designs/' . $design->pic3))) {
                unlink(public_path('images/designs/' . $design->pic3));
            }

            $imageName3 = time() . '.' . $request->image->extension();
            $request->pic3->move(public_path('images/designs'), $imageName3);
        }

        if ($request->hasFile('pic4')) {
            if ($design->pic4 && file_exists(public_path('images/designs/' . $design->pic4))) {
                unlink(public_path('images/designs/' . $design->pic4));
            }

            $imageName4 = time() . '.' . $request->image->extension();
            $request->pic4->move(public_path('images/designs'), $imageName4);
        }

        if ($request->hasFile('pic5')) {
            if ($design->pic5 && file_exists(public_path('images/designs/' . $design->pic5))) {
                unlink(public_path('images/designs/' . $design->pic5));
            }

            $imageName5 = time() . '.' . $request->image->extension();
            $request->pic5->move(public_path('images/designs'), $imageName5);
        }

        $design->title = $request->input('title');
        $design->slug = Str::slug($request->input('title'));
        $design->content = $request->input('content');
        $design->tags = implode(', ', $request->input('tags'));
        $design->status = $request->input('status') ? 'Aktif' : 'Tidak Aktif';

        $design->save();

        return redirect()->route('admin.design.index')->with('success', 'Blog berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $design = Design::where('id', $id)->first();

        if ($design->pic1 && file_exists(public_path('images/designs/' . $design->pic1))) {
            unlink(public_path('images/designs/' . $design->pic1));
        }

        if ($design->pic2 && file_exists(public_path('images/designs/' . $design->pic2))) {
            unlink(public_path('images/designs/' . $design->pic2));
        }

        if ($design->pic3 && file_exists(public_path('images/designs/' . $design->pic3))) {
            unlink(public_path('images/designs/' . $design->pic3));
        }

        if ($design->pic4 && file_exists(public_path('images/designs/' . $design->pic4))) {
            unlink(public_path('images/designs/' . $design->pic4));
        }

        if ($design->pic5 && file_exists(public_path('images/designs/' . $design->pic5))) {
            unlink(public_path('images/designs/' . $design->pic5));
        }

        $design->delete();

        return response()->json(['warning' => 'Design berhasil dihapus.']);
    }

    public function getTags(Request $request)
    {
        $search = $request->input('q');

        $allTags = Design::pluck('tags')
            ->flatMap(function ($tags) {
                return explode(', ', $tags);
            })
            ->unique()
            ->filter(function ($tag) use ($search) {
                return stripos($tag, $search) !== false;
            })
            ->values();

        $results = $allTags->map(function ($tag) {
            return ['id' => $tag, 'text' => $tag];
        });

        return response()->json($results);
    }
}
