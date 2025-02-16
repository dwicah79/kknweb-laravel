<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Speech;
use App\Models\Village_organization;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = About::select('title', 'image')->get()->map(function ($slide) {
            $slide->image = asset($slide->image);
            return $slide;
        });

        $village_organization = Village_organization::with('position')
            ->whereHas('position', function ($query) {
                $query->where('job_title', 'Kepala Dusun');
            })
            ->get(); // Mengambil semua data sebagai collection

        $headvillage = $village_organization->first();
        $speech = Speech::select('speech')->first();

        $data = [
            'headvillage' => $headvillage, // Ubah ke single object, bukan collection
            'photo' => $headvillage ? asset($headvillage->image) : null, // Hindari error jika null
            'speech' => $speech ? $speech->speech : null,
        ];

        return view('home.index', compact('slides'), $data);

    }
}
