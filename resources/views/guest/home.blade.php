<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatGPT Home</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg p-8 shadow-lg max-w-sm">
        <div class="text-center">
            <h1 class="text-3xl font-semibold text-gray-800 mb-4">مرحبا بك، في منصة المشاريع الهندسية</h1>
            <p class="text-gray-500">منصة لإنجاز المشاريع الهندسية</p>
        </div>
        <div class="mt-8 space-y-4">
            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg block text-center font-semibold transition duration-300">
                تسجيل دخول
            </a>
            <a href="{{ route('register.user') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded-lg block text-center font-semibold transition duration-300">
                تسجيل مستخدم جديد
            </a>
        </div>
    </div>
</body>
</html>
