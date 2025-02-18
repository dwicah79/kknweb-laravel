<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\About;
use App\Models\Speech;
use Illuminate\Http\Request;
use App\Models\Village_organization;

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
            ->get();
        $headvillage = $village_organization->first();
        $speech = Speech::select('speech')->first();
        $data2 = Village_organization::with('position')->get();
        $news = News::latest()->take(6)->get();

        $data = [
            'headvillage' => $headvillage,
            'photo' => $headvillage ? asset($headvillage->image) : null,
            'speech' => $speech ? $speech->speech : null,
        ];
        return view('home.index', compact('slides', 'data2', 'news'), $data);
    }
}
