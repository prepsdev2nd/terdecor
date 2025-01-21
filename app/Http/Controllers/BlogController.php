<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.blog.index');
    }

    public function getData()
    {
        $data = Blog::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<div class="btn-group"><a href="' . route('admin.blog.edit', $data->id) . '" class="btn btn-sm btn-warning"><i data-feather="edit"></i></a><button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.blog.delete', $data->id) . '`)"><i data-feather="trash-2"></i></button></div>';
            })
            ->editColumn('tags', function ($data) {
                $tags = explode(', ', $data->tags);

                return collect($tags)->map(function ($tag) {
                    return '<span class="badge bg-purple-soft text-purple">' . e($tag) . '</span>';
                })->implode(' ');
            })
            ->editColumn('image', function ($data) {
                return '<img src="' . asset('images/blogs/' . $data->image) . '" alt="' . e($data->title) . '" style="max-height: 150px; max-width: 150px;">';
            })
            ->editColumn('status', function ($data) {
                if ($data->status == "Aktif") {
                    $status = '<span class="badge bg-success-soft text-success">' . $data->status . '</span>';
                } else {
                    $status = '<span class="badge bg-danger-soft text-danger">' . $data->status . '</span>';
                }

                return $status;
            })
            ->rawColumns(['action', 'status', 'content', 'image', 'labels', 'tags'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
        }

        $data = new Blog();
        $data->title = $request->input('title');
        $data->slug = Str::slug($request->input('title'));
        $data->image = $imageName ?? null;
        $data->content = $request->input('content');
        $data->tags = implode(', ', $request->input('tags'));
        $data->status = $request->input('status') ? 'Aktif' : 'Tidak Aktif';

        $data->save();

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Blog::findOrFail($id);

        return view('admin.blog.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'required',
        ]);

        $blog = Blog::where('id', $id)->first();

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path('images/blogs/' . $blog->image))) {
                unlink(public_path('images/blogs/' . $blog->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $blog->image = $imageName;
        }

        $blog->title = $request->input('title');
        $blog->slug = Str::slug($request->input('title'));
        $blog->content = $request->input('content');
        $blog->tags = implode(', ', $request->input('tags'));
        $blog->status = $request->input('status') ? 'Aktif' : 'Tidak Aktif';

        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $blog = Blog::where('id', $id)->first();

        if ($blog->image && file_exists(public_path('images/blogs/' . $blog->image))) {
            unlink(public_path('images/blogs/' . $blog->image));
        }

        $blog->delete();

        return response()->json(['warning' => 'Blog berhasil dihapus.']);
    }

    public function getTags(Request $request)
    {
        $search = $request->input('q');

        $allTags = Blog::pluck('tags')
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
