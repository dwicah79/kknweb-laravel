<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\PKK_Organization;

class PKKController extends Controller
{
    public function index(Request $request)
    {
        $querry = $request->input('search');
        $data = PKK_Organization::when($querry, function ($q) use ($querry) {
            return $q->where('name', 'like', "%$querry%");
        })->paginate(10);

        return view('dashboard.pkk-organization.index', compact('data'));
    }

    public function create()
    {
        $data = Position::all();
        return view('dashboard.pkk-organization.create', compact('data'));
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

            PKK_Organization::create([
                'name' => $request->name,
                'telp' => $request->telp,
                'job_title_id' => $request->position,
                'image' => $imagePath,
            ]);

            return redirect()->route('pkk.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data = PKK_Organization::find($id);
        $position = Position::all();
        return view('dashboard.pkk-organization.detile', compact('data', 'position'));
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
            $data = PKK_Organization::find($id);

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

            return redirect()->route('pkk.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $data = PKK_Organization::find($id);
        $data->delete();

        return redirect()->route('pkk.index')->with('success', 'Data berhasil dihapus');
    }
}
