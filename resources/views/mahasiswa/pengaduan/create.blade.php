<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto">
            <a href="{{ route('mahasiswa.dashboard') }}" class="hover:underline">← Kembali ke Dashboard</a>
        </div>
    </nav>

    <div class="container mx-auto p-6 max-w-2xl">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6">Buat Pengaduan Baru</h2>
            
            <form method="POST" action="{{ route('mahasiswa.pengaduan.store') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Pengaduan</label>
                    <input type="text" name="judul" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Isi Pengaduan</label>
                    <textarea name="isi_aduan" rows="6" required 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                
                <div class="flex space-x-4">
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                        Kirim Pengaduan
                    </button>
                    <a href="{{ route('mahasiswa.dashboard') }}" 
                       class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>