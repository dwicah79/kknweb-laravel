<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

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
}
