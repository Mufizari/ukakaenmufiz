<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengaduan Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 to-purple-600 min-h-screen flex items-center justify-center">
    <div class="bg-white p-10 rounded-lg shadow-2xl max-w-md w-full text-center">
        <h1 class="text-4xl font-bold text-blue-600 mb-4">Sistem Pengaduan</h1>
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Mahasiswa</h2>
        <p class="text-gray-500 mb-8">Silakan pilih portal login Anda</p>
        
        <div class="space-y-4">
            <a href="{{ route('login') }}" 
               class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-6 rounded-lg transition transform hover:scale-105">
                🎓 Login Mahasiswa
            </a>
            
            <a href="{{ route('admin.login') }}" 
               class="block w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-6 rounded-lg transition transform hover:scale-105">
                👨‍💼 Login Admin
            </a>
            
            <a href="{{ route('register') }}" 
               class="block w-full bg-gray-500 hover:bg-gray-600 text-white font-bold py-4 px-6 rounded-lg transition transform hover:scale-105">
                📝 Register Mahasiswa
            </a>
        </div>
        
        <p class="text-gray-400 text-sm mt-8">© 2024 Sistem Pengaduan Mahasiswa</p>
    </div>
</body>
</html>