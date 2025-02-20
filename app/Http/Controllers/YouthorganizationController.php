<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Youth_Organization;
use Illuminate\Http\Request;

class YouthorganizationController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $data = Youth_Organization::when($query, function ($q) use ($query) {
            return $q->where('name', 'like', "%$query%");
        })->paginate(10);

        return view('dashboard.youth-organization.index', compact('data'));
    }

    public function create()
    {
        $data = Position::all();

        return view('dashboard.youth-organization.create', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'position' => 'required|exists:positions,id',
            'telp' => 'required',
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

            Youth_Organization::create([
                'name' => $request->name,
                'telp' => $request->telp,
                'job_title_id' => $request->position,
                'image' => $imagePath,
            ]);

            return redirect()->route('youth-organization.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data = Youth_Organization::find($id);
        $position = Position::all();
        return view('dashboard.youth-organization.detail', compact('data', 'position'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required|exists:positions,id',
            'telp' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $data = Youth_Organization::find($id);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);

                $imagePath = 'uploads/' . $fileName;
            } else {
                $imagePath = $data->image;
            }

            $data->update([
                'name' => $request->name,
                'telp' => $request->telp,
                'job_title_id' => $request->position,
                'image' => $imagePath,
            ]);

            return redirect()->route('youth-organization.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $data = Youth_Organization::find($id);
        $data->delete();

        return redirect()->route('village.index')->with('success', 'Data berhasil dihapus');
    }

}
