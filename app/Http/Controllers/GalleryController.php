<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $querry = $request->input('search');

        $data = Gallery::when($querry, function ($query) use ($querry) {
            $query->where('title', 'like', "%$querry%");
        })->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.gallery.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);

                $imagePath = 'uploads/' . $fileName;
            } else {
                return redirect()->back()->withErrors(['image' => 'Image is required']);
            }

            Gallery::create([
                'title' => $request->title,
                'image' => $imagePath,
            ]);
            return redirect()->route('gallery.index')->with('success', 'Gallery created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = Gallery::find($id);
        return view('dashboard.gallery.detile', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $gallery = Gallery::find($request->id);
            $imagePath = $gallery->image;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);

                $imagePath = 'uploads/' . $fileName;
            }

            $gallery->update([
                'title' => $request->title,
                'image' => $imagePath,
            ]);

            return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $gallery = Gallery::find($id);
            $gallery->delete();
            return redirect()->route('gallery.index')->with('success', 'Gallery deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
