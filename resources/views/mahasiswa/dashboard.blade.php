<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Dashboard Mahasiswa</h1>
            <div class="flex items-center space-x-4">
                <span>{{ auth()->guard('mahasiswa')->user()->nama }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6">
            <a href="{{ route('mahasiswa.pengaduan.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                + Buat Pengaduan Baru
            </a>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-xl font-bold">Daftar Pengaduan Anda</h2>
            </div>
            <div class="p-6">
                @if($pengaduans->count() > 0)
                    <div class="space-y-4">
                        @foreach($pengaduans as $pengaduan)
                            <div class="border rounded-lg p-4 hover:shadow-md transition">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-lg">{{ $pengaduan->judul }}</h3>
                                        <p class="text-gray-600 text-sm mt-1">{{ Str::limit($pengaduan->isi_aduan, 100) }}</p>
                                        <p class="text-sm text-gray-500 mt-2">{{ $pengaduan->created_at->format('d M Y') }}</p>
                                    </div>
                                    <div>
                                        @if($pengaduan->status == 'pending')
                                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">Pending</span>
                                        @elseif($pengaduan->status == 'proses')
                                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Proses</span>
                                        @else
                                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Selesai</span>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('mahasiswa.pengaduan.show', $pengaduan->id) }}" 
                                   class="text-blue-600 hover:underline mt-2 inline-block">Lihat Detail →</a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4">Belum ada pengaduan</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>