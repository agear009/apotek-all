<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .btn-hover:hover {
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-md p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Selamat Datang</h2>
        <p class="text-center text-gray-500">Silakan masuk ke akun Anda</p>

        <!-- ALERT ERROR LOGIN -->
        @if(session('error'))
            <div class="p-3 mt-4 text-sm text-white bg-red-500 rounded-md">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login-check" method="POST" class="mt-6">
            @csrf
            <div>
                <label class="block text-gray-600">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 mt-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div class="mt-4">
                <label class="block text-gray-600">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 mt-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div class="flex items-center justify-between mt-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="text-blue-600">
                    <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
                </label>
                <a href="#" class="text-sm text-blue-500 hover:underline">Lupa Password?</a>
            </div>

            <button type="submit" class="w-full px-4 py-2 mt-6 text-white bg-blue-600 rounded-lg btn-hover">Masuk</button>
        </form>

        <div class="flex items-center justify-center mt-4">
            <span class="h-[1px] bg-gray-300 w-1/3"></span>
            <span class="px-3 text-gray-500 text-sm">atau</span>
            <span class="h-[1px] bg-gray-300 w-1/3"></span>
        </div>

        <!-- LOGIN DENGAN GOOGLE -->
        <a href="login/google" class="w-full flex justify-center items-center px-4 py-2 mt-4 text-white bg-red-500 rounded-lg btn-hover">
            <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5 h-5 mr-2" alt="Google Logo">
            Masuk dengan Google
        </a>

        <p class="mt-4 text-sm text-center text-gray-600">
            Belum punya akun? <a href="/register" class="text-blue-500 hover:underline">Daftar Sekarang</a>
        </p>
    </div>

</body>
</html>
