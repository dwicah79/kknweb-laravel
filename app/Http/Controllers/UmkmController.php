<?php

namespace App\Http\Controllers;

// use Log;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $data = Umkm::paginate(10);
        return view('dashboard.umkm.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.umkm.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'telp' => 'required|numeric',
            'description' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            if (!file_exists(public_path('uploads'))) {
                mkdir(public_path('uploads'), 0777, true);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                Log::info('File ditemukan: ' . $file->getClientOriginalName());

                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName); // Simpan ke public/uploads

                $imagePath = 'uploads/' . $fileName; // Simpan path tanpa "public/"
            } else {
                return redirect()->back()->withErrors(['image' => 'Image is required']);
            }

            Umkm::create([
                'name' => $request->name,
                'telp' => $request->telp,
                'description' => $request->description,
                'address' => $request->address,
                'image' => $imagePath,
            ]);

            return redirect()->route('umkm.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error('Error storing UMKM: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Data gagal ditambahkan');
        }
    }

    public function destroy($id)
    {
        try {
            $umkm = Umkm::findOrFail($id);
            $umkm->delete();
            return redirect()->route('umkm.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Error deleting UMKM: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }




}
