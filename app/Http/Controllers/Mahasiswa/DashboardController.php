<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $pengaduans = $mahasiswa->pengaduans()->latest()->get();
        
        return view('mahasiswa.dashboard', compact('pengaduans'));
    }
}
