<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = About::select('title', 'image')->get();
        return view('home.index', compact('slides'));
    }
}
