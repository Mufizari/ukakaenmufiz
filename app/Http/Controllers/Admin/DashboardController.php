<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengaduan = Pengaduan::count();
        $pending = Pengaduan::where('status', 'pending')->count();
        $proses = Pengaduan::where('status', 'proses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();

        return view('admin.dashboard', compact('totalPengaduan', 'pending', 'proses', 'selesai'));
    }
}