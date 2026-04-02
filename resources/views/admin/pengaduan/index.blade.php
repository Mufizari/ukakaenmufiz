<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengaduan - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-green-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Dashboard Admin</h1>
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
                <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-2xl font-bold">Daftar Pengaduan Mahasiswa</h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mahasiswa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($pengaduans as $index => $pengaduan)
                        <tr>
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                <div>
                                    <p class="font-medium">{{ $pengaduan->mahasiswa->nama }}</p>
                                    <p class="text-sm text-gray-500">{{ $pengaduan->mahasiswa->nim }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ $pengaduan->judul }}</td>
                            <td class="px-6 py-4">
                                @if($pengaduan->status == 'pending')
                                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Pending</span>
                                @elseif($pengaduan->status == 'proses')
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Proses</span>
                                @else
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Selesai</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $pengaduan->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}" 
                                   class="text-green-600 hover:underline font-bold">Lihat Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>