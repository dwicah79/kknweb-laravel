<?php

namespace App\Http\Controllers;

use App\Models\PKK_Organization;
use App\Models\Umkm;
use App\Models\Village_organization;
use App\Models\Youth_Organization;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {


        return view('dashboard.index');
    }
}
