<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = About::select('title', 'image')->get()->map(function ($slide) {
            $slide->image = asset($slide->image); // Buat URL absolut
            return $slide;
        });

        return view('home.index', compact('slides'));
    }
}
