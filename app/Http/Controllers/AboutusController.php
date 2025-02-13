<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
        $data = About::orderBy('created_at', 'desc')->paginate(5);

        return view('dashboard.aboutus.index', compact('data'));
    }

    public function createslider()
    {
        return view('dashboard.aboutus.create');
    }

    public function sliderstore(Request $request)
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

            About::create([
                'title' => $request->title,
                'image' => $imagePath,
            ]);

            return redirect()->route('about.index')->with('success', value: 'Slider berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function editslider($id)
    {
        $data = About::find($id);
        return view('dashboard.aboutus.detile', compact('data'));
    }

    public function updateslider(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $data = About::find($id);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);

                $imagePath = 'uploads/' . $fileName;
            } else {
                $imagePath = $data->image;
            }

            $data->update([
                'title' => $request->title,
                'image' => $imagePath,
            ]);

            return redirect()->route('about.index')->with('success', 'Slider berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroyslider($id)
    {
        try {
            $data = About::find($id);
            $data->delete();

            return redirect()->route('about.index')->with('success', 'Slider berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
