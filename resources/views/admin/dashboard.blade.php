<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-green-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Dashboard Admin</h1>
            <div class="flex items-center space-x-4">
                <span>{{ auth()->guard('admin')->user()->nama }}</span>
                <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-500 text-sm">Total Pengaduan</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $totalPengaduan }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-500 text-sm">Pending</h3>
                <p class="text-3xl font-bold text-yellow-600">{{ $pending }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-500 text-sm">Proses</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $proses }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-500 text-sm">Selesai</h3>
                <p class="text-3xl font-bold text-green-600">{{ $selesai }}</p>
            </div>
        </div>

        <!-- Link ke Daftar Pengaduan -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-xl font-bold">Pengaduan Terbaru</h2>
            </div>
            <div class="p-6">
                <a href="{{ route('admin.pengaduan.index') }}" 
                   class="text-green-600 hover:underline font-bold">Lihat Semua Pengaduan →</a>
            </div>
        </div>
    </div>
</body>
</html>