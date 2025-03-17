<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

    <!-- Navbar -->
    <nav class="flex justify-between items-center p-5 bg-gray-800">
        <h1 class="text-xl font-bold text-yellow-400">Find Job</h1>
        <ul class="flex space-x-6">
            <li><a href="#" class="hover:text-yellow-400">Home</a></li>
            <li><a href="#" class="hover:text-yellow-400">Pages</a></li>
            <li><a href="#" class="hover:text-yellow-400">Jobs</a></li>
            <li><a href="#" class="hover:text-yellow-400">Employers</a></li>
            <li><a href="#" class="hover:text-yellow-400">Blog</a></li>
        </ul>
        <div>
            <a href="{{ route('register') }}" class="text-yellow-400 mr-4">Register</a>
            <a href="{{ route('login') }}" class="bg-yellow-400 text-gray-900 px-4 py-2 rounded">Sign In</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="container mx-auto flex flex-col md:flex-row items-center p-10">
        <!-- Left Content -->
        <div class="md:w-1/2 space-y-4">
            <h1 class="text-4xl font-bold">Find Every Job in One <span class="text-yellow-400">Platform</span></h1>
            <p class="text-gray-400">Jelajahi ribuan lowongan pekerjaan dari berbagai industri dan lokasi. Dapatkan kesempatan terbaik sesuai dengan keterampilan dan minatmu. Daftar sekarang dan mulailah perjalanan kariermu bersama kami!</p>
            
            <!-- Search Bar -->
            <form action="{{ route('search.jobs') }}" method="GET" class="flex space-x-2 bg-white rounded p-2">
                <input type="text" name="keyword" class="w-1/3 p-2 text-sm text-gray-900 rounded" placeholder="Search Job">
                <input type="text" name="location" class="w-1/3 p-2 text-sm text-gray-900 rounded" placeholder="Search Location">
                <button type="submit" class="bg-gray-900 text-white px-4 py-2 text-sm rounded">Find Job</button>
            </form>

            <!-- Job Type Filters -->
            <div class="flex space-x-4 mt-4">
                <label class="flex items-center bg-yellow-400 text-gray-900 px-4 py-2 rounded">
                    <input type="checkbox" name="job_type[]" value="Full Time" class="mr-2"> Full Time
                </label>
                <label class="flex items-center bg-yellow-400 text-gray-900 px-4 py-2 rounded">
                    <input type="checkbox" name="job_type[]" value="Part Time" class="mr-2"> Part Time
                </label>
                <label class="flex items-center bg-yellow-400 text-gray-900 px-4 py-2 rounded">
                    <input type="checkbox" name="job_type[]" value="Remote" class="mr-2"> Remote
                </label>
            </div>
        </div>

        <!-- Right Content (Image) -->
        <div class="md:w-1/2 flex justify-center">
            <div class="relative">
            <img src="{{ asset('images/job-hero.jpg') }}" alt="Job Portal" class="rounded-lg shadow-lg">
                <div class="absolute top-5 right-5 bg-white text-gray-900 p-3 rounded shadow-lg">
                    <span class="font-bold text-xl">12K</span><br>Companies Jobs
                </div>
                <div class="absolute bottom-5 left-5 bg-white text-gray-900 p-3 rounded shadow-lg">
                    <span class="font-bold text-xl">4.5K</span><br>Jobs Done
                </div>
            </div>
        </div>
    </section>

</body>
</html>
