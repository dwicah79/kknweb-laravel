<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Umkm;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PKK_Organization;
use App\Models\Youth_Organization;
use App\Models\Village_organization;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data berita per bulan
        $newsPerMonth = News::selectRaw('MONTH(add_date) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Format data untuk Chart.js
        $labels = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ];

        // Buat array dengan nilai default 0 untuk setiap bulan
        $data = array_fill(0, 12, 0);

        // Isi jumlah berita sesuai dengan bulan yang ditemukan
        foreach ($newsPerMonth as $news) {
            $data[$news->month - 1] = $news->total;
        }

        $latest_news = News::orderBy('add_date', 'desc')->limit(5)->paginate(5);

        return view('dashboard.index', [
            'total_berita' => News::count(),
            'total_umkm' => Umkm::count(),
            'total_pengguna' => User::count(),
            'berita' => $latest_news,
            'labels' => $labels,
            'data' => $data,
        ]);
    }

}
