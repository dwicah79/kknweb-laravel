<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Village_organization;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function index()
    {
        $data = Village_organization::with('village')->paginate(10);
        // return $data;
        return view('dashboard.village-organization.index', compact('data'));
    }

    public function create()
    {
        $data = Position::all();
        return view('dashboard.village-organization.create', compact('data'));
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

            Village_organization::create([
                'name' => $request->name,
                'telp' => $request->telp,
                'job_title_id' => $request->position,
                'image' => $imagePath,
            ]);

            return redirect()->route('village.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data = Village_organization::find($id);
        $position = Position::all();
        return view('dashboard.village-organization.detile', compact('data', 'position'));
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
            $data = Village_organization::find($id);

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

            return redirect()->route('village.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $data = Village_organization::find($id);
        $data->delete();

        return redirect()->route('village.index')->with('success', 'Data berhasil dihapus');
    }
}
