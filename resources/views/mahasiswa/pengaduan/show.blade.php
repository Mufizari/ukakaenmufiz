<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto">
            <a href="{{ route('mahasiswa.dashboard') }}" class="hover:underline">← Kembali ke Dashboard</a>
        </div>
    </nav>

    <div class="container mx-auto p-6 max-w-3xl">
        <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
            <div class="flex justify-between items-start mb-4">
                <h2 class="text-2xl font-bold">{{ $pengaduan->judul }}</h2>
                @if($pengaduan->status == 'pending')
                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full">Pending</span>
                @elseif($pengaduan->status == 'proses')
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full">Proses</span>
                @else
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full">Selesai</span>
                @endif
            </div>
            
            <p class="text-gray-600 mb-4">{{ $pengaduan->created_at->format('d M Y, H:i') }}</p>
            
            <div class="border-t pt-4">
                <h3 class="font-bold mb-2">Isi Pengaduan:</h3>
                <p class="text-gray-700 whitespace-pre-line">{{ $pengaduan->isi_aduan }}</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <h3 class="text-xl font-bold mb-4">Tanggapan Admin</h3>
            
            @if($pengaduan->tanggapans->count() > 0)
                <div class="space-y-4">
                    @foreach($pengaduan->tanggapans as $tanggapan)
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <p class="text-sm text-gray-600 mb-2">Oleh: {{ $tanggapan->admin->nama }}</p>
                            <p class="text-gray-700">{{ $tanggapan->isi_tanggapan }}</p>
                            <p class="text-xs text-gray-500 mt-2">{{ $tanggapan->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-4">Belum ada tanggapan</p>
            @endif
        </div>
    </div>
</body>
</html>