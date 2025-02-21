<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Umkm;
use App\Models\About;
use App\Models\Speech;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Youth_Organization;
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
        $umkm = Umkm::latest()->take(6)->get();

        $data = [
            'headvillage' => $headvillage,
            'photo' => $headvillage ? asset($headvillage->image) : null,
            'speech' => $speech ? $speech->speech : null,
        ];
        // return $slides;
        return view('home.index', compact('slides', 'data2', 'news', 'umkm'), $data);
    }

    public function newsindex()
    {
        $news = News::orderBy('add_date', 'desc')->paginate(9);
        return view('home.news.index', compact('news'));
    }

    public function newsdetile($id)
    {
        $news = News::find($id);
        $recentNews = News::latest()->take(5)->get();

        // return $recentNews;
        return view('home.news.detile', compact('news', 'recentNews'));
    }

    public function umkmindex()
    {
        $umkm = Umkm::latest()->paginate(9);
        return view('home.umkm.index', compact('umkm'));
    }

    public function umkmdetile($id)
    {
        $umkm = Umkm::find($id);
        $recentUmkm = Umkm::latest()->take(5)->get();

        return view('home.umkm.detile', compact('umkm', 'recentUmkm'));
    }

    public function youthindex()
    {
        $youth = Youth_Organization::paginate(9);
        return view('home.youth-organization.index', compact('youth'));
    }

    public function galleryindex()
    {
        $gallery = Gallery::orderBy('created_at', 'desc')->paginate(8);
        return view('home.gallery.index', compact('gallery'));
    }
}
