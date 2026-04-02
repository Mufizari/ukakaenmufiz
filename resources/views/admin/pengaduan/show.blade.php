<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-green-600 text-white p-4">
        <div class="container mx-auto">
            <a href="{{ route('admin.pengaduan.index') }}" class="hover:underline">← Kembali</a>
        </div>
    </nav>

    <div class="container mx-auto p-6 max-w-4xl">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

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
            
            <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                <div>
                    <p class="text-gray-500">Nama:</p>
                    <p class="font-medium">{{ $pengaduan->mahasiswa->nama }}</p>
                </div>
                <div>
                    <p class="text-gray-500">NIM:</p>
                    <p class="font-medium">{{ $pengaduan->mahasiswa->nim }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Email:</p>
                    <p class="font-medium">{{ $pengaduan->mahasiswa->email }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Tanggal:</p>
                    <p class="font-medium">{{ $pengaduan->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
            
            <div class="border-t pt-4">
                <h3 class="font-bold mb-2">Isi Pengaduan:</h3>
                <p class="text-gray-700 whitespace-pre-line bg-gray-50 p-4 rounded">{{ $pengaduan->isi_aduan }}</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
            <h3 class="text-xl font-bold mb-4">Tanggapan</h3>
            
            @if($pengaduan->tanggapans->count() > 0)
                <div class="space-y-4 mb-6">
                    @foreach($pengaduan->tanggapans as $tanggapan)
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <p class="text-sm text-gray-600 mb-2">Oleh: {{ $tanggapan->admin->nama }}</p>
                            <p class="text-gray-700">{{ $tanggapan->isi_tanggapan }}</p>
                            <p class="text-xs text-gray-500 mt-2">{{ $tanggapan->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($pengaduan->status != 'selesai')
                <form method="POST" action="{{ route('admin.pengaduan.tanggapi', $pengaduan->id) }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Berikan Tanggapan:</label>
                        <textarea name="isi_tanggapan" rows="4" required 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500"></textarea>
                    </div>
                    <button type="submit" 
                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                        Kirim Tanggapan
                    </button>
                </form>
            @else
                <p class="text-gray-500 text-center py-4">Pengaduan sudah ditanggapi</p>
            @endif
        </div>
    </div>
</body>
</html>