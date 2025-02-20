<?php

namespace App\Http\Controllers;

use App\Models\Speech;
use Illuminate\Http\Request;

class SpeechController extends Controller
{
    public function index()
    {
        $data = Speech::paginate(10);
        return view('dashboard.speech.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.speech.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'speech' => 'required',
        ]);

        try {
            Speech::create([
                'speech' => $request->speech,
            ]);

            return redirect()->route('speech.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data = Speech::find($id);
        return view('dashboard.speech.detile', compact('data'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'speech' => 'required',
        ]);

        try {
            Speech::find($id)->update([
                'speech' => $request->speech,
            ]);

            return redirect()->route('speech.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Speech::find($id)->delete();
            return redirect()->route('speech.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
