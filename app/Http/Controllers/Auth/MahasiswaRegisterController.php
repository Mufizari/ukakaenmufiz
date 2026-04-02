<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MahasiswaRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.mahasiswa.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:mahasiswas,nim',
            'email' => 'required|email|unique:mahasiswas,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('mahasiswa')->login($mahasiswa);

        return redirect()->route('mahasiswa.dashboard');
    }
}
