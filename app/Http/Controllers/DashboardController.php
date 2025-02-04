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
        $data = [
            'UMKM' => Umkm::paginate(5),
            'PKK' => PKK_Organization::with('village')->paginate(10),
            'Pemuda' => Youth_Organization::with('village')->paginate(10),
            'Dusun' => Village_organization::with('village')->paginate(10),
        ];

        return $data;

        // return view('dashboard.index');
    }
}
