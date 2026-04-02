<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('mahasiswa.pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_aduan' => 'required|string',
        ]);

        Pengaduan::create([
            'mahasiswa_id' => Auth::guard('mahasiswa')->id(),
            'judul' => $request->judul,
            'isi_aduan' => $request->isi_aduan,
            'status' => 'pending',
        ]);

        return redirect()->route('mahasiswa.dashboard')->with('success', 'Pengaduan berhasil dibuat!');
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::with('tanggapans.admin')->findOrFail($id);
        return view('mahasiswa.pengaduan.show', compact('pengaduan'));
    }
}
