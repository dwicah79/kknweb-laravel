<?php

namespace App\Http\Controllers;

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
}
