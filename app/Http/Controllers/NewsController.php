<?php

namespace App\Http\Controllers;

use App\Models\Category_News;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::with('category')->paginate(10);
        // return $data;
        return view(('dashboard.news.index'), compact('data'));
    }

    public function create()
    {
        $category = Category_News::all();
        // return $categori;
        return view('dashboard.news.create', compact('category'));

    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'category' => 'required|exists:category__news,id',
            'writer' => 'required',
            'content' => 'required',
            'date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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

            News::create([
                'title' => $request->title,
                'writer' => $request->writer,
                'category_id' => $request->category,
                'thumbnail' => $imagePath,
                'content' => $request->content,
                'add_date' => $request->date,
            ]);

            return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data = News::find($id);
        $category = Category_News::all();
        return view('dashboard.news.detile', compact('data', 'category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|exists:category__news,id',
            'writer' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048 || nullable',
            'date' => 'required',
        ]);

        try {
            $news = News::find($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);

                $imagePath = 'uploads/' . $fileName;
            } else {
                $imagePath = $news->image;
            }
            $news->update([
                'title' => $request->title,
                'writer' => $request->writer,
                'category_id' => $request->category,
                'content' => $request->content,
                'thumbnail' => $imagePath,
                'add_date' => $request->date,
            ]);

            return redirect()->route('news.index')->with('success', 'Berita berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $news = News::find($id);
            $news->delete();

            return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



}
