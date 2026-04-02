<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::with('mahasiswa')->latest()->get();
        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::with(['mahasiswa', 'tanggapans.admin'])->findOrFail($id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function tanggapi(Request $request, $id)
    {
        $request->validate([
            'isi_tanggapan' => 'required|string',
        ]);

        Tanggapan::create([
            'pengaduan_id' => $id,
            'admin_id' => Auth::guard('admin')->id(),
            'isi_tanggapan' => $request->isi_tanggapan,
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update(['status' => 'selesai']);

        return redirect()->route('admin.pengaduan.show', $id)->with('success', 'Tanggapan berhasil dikirim!');
    }
}
