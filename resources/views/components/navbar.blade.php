<nav class="flex justify-between items-center px-10 py-6 bg-gray-800 text-white">
    <!-- Logo -->
    <h1 class="text-2xl font-bold text-yellow-400">Find Job</h1>

    <!-- Menu Navigasi -->
    <div class="hidden md:flex space-x-6">
        <a href="#" class="hover:text-yellow-400">Home</a>
        <a href="#" class="hover:text-yellow-400">Pages</a>
        <a href="#" class="hover:text-yellow-400">Jobs</a>
        <a href="#" class="hover:text-yellow-400">Employers</a>
        <a href="#" class="hover:text-yellow-400">Blog</a>
    </div>

    <!-- Tombol Login & Register -->
    <div class="space-x-4">
        <a href="{{ route('register') }}" class="text-yellow-400 hover:text-yellow-300">Register</a>
        <a href="{{ route('login') }}" class="bg-yellow-400 text-gray-900 px-4 py-2 rounded-md font-semibold hover:bg-yellow-300">Sign In</a>
    </div>
</nav>
