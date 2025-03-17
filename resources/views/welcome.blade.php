<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LowKer - Lowongan Pekerjaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

    <!-- Header -->
    <header>
        <nav class="flex justify-between items-center p-5 bg-gray-800">
            <h1 class="text-xl font-bold text-yellow-400">LowKer</h1>
            <ul class="flex space-x-6">
                <li><a href="#" class="hover:text-yellow-400">Home</a></li>
                <li><a href="#" class="hover:text-yellow-400">Pages</a></li>
                <li><a href="#" class="hover:text-yellow-400">Jobs</a></li>
                <li><a href="#" class="hover:text-yellow-400">Employers</a></li>
                <li><a href="#" class="hover:text-yellow-400">Blog</a></li>
            </ul>
            <div>
                <a href="{{ route('register') }}" class="text-yellow-400 mr-4" aria-label="Register">Register</a>
                <a href="{{ route('login') }}" class="bg-yellow-400 text-gray-900 px-4 py-2 rounded" aria-label="Sign In">Sign In</a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="container mx-auto flex flex-col md:flex-row items-center p-10">
            <!-- Left Content -->
            <div class="md:w-1/2 space-y-6">
                <h1 class="text-4xl font-bold">
                    Temukan Setiap Pekerjaan dalam Satu <span class="text-yellow-400">Platform</span>
                </h1>
                <p class="text-gray-500">
                    Jelajahi ribuan lowongan pekerjaan dari berbagai industri dan lokasi. Dapatkan kesempatan terbaik sesuai dengan keterampilan dan minatmu. Daftar sekarang dan mulailah perjalanan kariermu bersama kami!
                </p>

                <!-- Search Bar -->
                <form action="{{ route('search.jobs') }}" method="GET" class="flex flex-wrap gap-3 bg-white rounded-lg p-4 shadow-md">
                    <input type="text" name="keyword" class="flex-grow p-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search Job" aria-label="Search Job">
                    <input type="text" name="location" class="flex-grow p-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search Location" aria-label="Search Location">
                    <button type="submit" class="w-full sm:w-auto bg-blue-600 text-white px-4 py-3 text-sm font-medium rounded-lg hover:bg-blue-700 transition focus:ring-2 focus:ring-blue-500" aria-label="Find Jobs">Find Job</button>
                </form>

                <!-- Job Type Filters -->
                <div class="flex flex-wrap gap-3 mt-4">
                    <label class="flex items-center bg-yellow-300 text-gray-900 px-4 py-2 rounded-lg cursor-pointer hover:bg-yellow-400 transition">
                        <input type="checkbox" name="job_type[]" value="Full Time" class="mr-2"> Full Time
                    </label>
                    <label class="flex items-center bg-yellow-300 text-gray-900 px-4 py-2 rounded-lg cursor-pointer hover:bg-yellow-400 transition">
                        <input type="checkbox" name="job_type[]" value="Part Time" class="mr-2"> Part Time
                    </label>
                    <label class="flex items-center bg-yellow-300 text-gray-900 px-4 py-2 rounded-lg cursor-pointer hover:bg-yellow-400 transition">
                        <input type="checkbox" name="job_type[]" value="Remote" class="mr-2"> Remote
                    </label>
                </div>
            </div>

            <!-- Right Content (Image) -->
            <div class="md:w-1/2 flex justify-center">
                <div class="relative">
                    <img src="{{ asset('images/job.png') }}" alt="Job Portal" class="rounded-lg shadow-lg">
                    <div class="absolute top-5 right-5 bg-white text-gray-900 p-3 rounded shadow-lg">
                        <span class="font-bold text-xl">12K</span><br>Companies Jobs
                    </div>
                    <div class="absolute bottom-5 left-5 bg-white text-gray-900 p-3 rounded shadow-lg">
                        <span class="font-bold text-xl">4.5K</span><br>Jobs Done
                    </div>
                </div>
            </div>
        </section>

        <!-- Explore by Category Section -->
        {{-- <section class="container mx-auto mt-10">
            <h2 class="text-3xl font-bold mb-6">Explore by <span class="text-blue-400">category</span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Category Cards -->
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition" aria-label="Design">
                    <h3 class="font-bold text-lg">Design</h3>
                    <p class="text-gray-400">235 jobs available &rarr;</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition" aria-label="Sales">
                    <h3 class="font-bold text-lg">Sales</h3>
                    <p class="text-gray-400">756 jobs available &rarr;</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition" aria-label="Marketing">
                    <h3 class="font-bold text-lg">Marketing</h3>
                    <p class="text-gray-400">140 jobs available &rarr;</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition" aria-label="Finance">
                    <h3 class="font-bold text-lg">Finance</h3>
                    <p class="text-gray-400">325 jobs available &rarr;</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition" aria-label="Technology">
                    <h3 class="font-bold text-lg">Technology</h3>
                    <p class="text-gray-400">436 jobs available &rarr;</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition" aria-label="Engineering">
                    <h3 class="font-bold text-lg">Engineering</h3>
                    <p class="text-gray-400">542 jobs available &rarr;</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition" aria-label="Business">
                    <h3 class="font-bold text-lg">Business</h3>
                    <p class="text-gray-400">211 jobs available &rarr;</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition" aria-label="Human Resource">
                    <h3 class="font-bold text-lg">Human Resource</h3>
                    <p class="text-gray-400">346 jobs available &rarr;</p>
                </div>
            </div>
            <div class="text-right mt-4">
                <a href="#" class="text-blue-400 hover:underline">Show all jobs &rarr;</a>
            </div>
        </section> --}}

        <!-- Featured Jobs Section -->
        {{-- <section class="container mx-auto mt-10">
            <h2 class="text-3xl font-bold mb-6">Featured <span class="text-blue-400">Jobs</span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Featured Job Cards -->
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition">
                    <h3 class="font-bold text-lg">Email Marketing</h3>
                    <p class="text-gray-400">Revolut • Madrid, Spain</p>
                    <p class="mt-2 text-sm text-green-500">Full Time</p>
                    <p class="mt-2 text-xs text-gray-400">Categories: Marketing, Design</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition">
                    <h3 class="font-bold text-lg">Brand Designer</h3>
                    <p class="text-gray-400">Dropbox • San Francisco, US</p>
                    <p class="mt-2 text-sm text-green-500">Full Time</p>
                    <p class="mt-2 text-xs text-gray-400">Categories: Design, Business</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition">
                    <h3 class="font-bold text-lg">Email Marketing</h3>
                    <p class="text-gray-400">Pitch • Berlin, Germany</p>
                    <p class="mt-2 text-sm text-green-500">Full Time</p>
                    <p class="mt-2 text-xs text-gray-400">Categories: Marketing</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition">
                    <h3 class="font-bold text-lg">Visual Designer</h3>
                    <p class="text-gray-400">Blinklist • Granada, Spain</p>
                    <p class="mt-2 text-sm text-green-500">Full Time</p>
                    <p class="mt-2 text-xs text-gray-400">Categories: Design</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition">
                    <h3 class="font-bold text-lg">Product Designer</h3>
                    <p class="text-gray-400">ClassPass • Manchester, UK</p>
                    <p class="mt-2 text-sm text-green-500">Full Time</p>
                    <p class="mt-2 text-xs text-gray-400">Categories: Marketing, Design</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition">
                    <h3 class="font-bold text-lg">Lead Designer</h3>
                    <p class="text-gray-400">Canva • Ontario, Canada</p>
                    <p class="mt-2 text-sm text-green-500">Full Time</p>
                    <p class="mt-2 text-xs text-gray-400">Categories: Design, Business</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition">
                    <h3 class="font-bold text-lg">Brand Strategist</h3>
                    <p class="text-gray-400">GoDaddy • Marseille, France</p>
                    <p class="mt-2 text-sm text-green-500">Full Time</p>
                    <p class="mt-2 text-xs text-gray-400">Categories: Marketing, Business</p>
                </div>
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition">
                    <h3 class="font-bold text-lg">Data Analyst</h3>
                    <p class="text-gray-400">Twitter • San Diego, US</p>
                    <p class="mt-2 text-sm text-green-500">Full Time</p>
                    <p class="mt-2 text-xs text-gray-400">Categories: Technology</p>
                </div>
            </div>
            <div class="text-right mt-4">
                <a href="#" class="text-blue-400 hover:underline">Show all jobs &rarr;</a>
            </div>
        </section>
    </main> --}}

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-10 mt-10">
        <div class="container mx-auto grid md:grid-cols-4 gap-8">
            <!-- Logo & Contact -->
            <div>
                <h2 class="text-xl font-bold mb-3 flex items-center">
                    <span class="mr-2">&#128188;</span> LowKer
                </h2>
                <p>LowKer adalah platform pencari pekerjaan yang dirancang untuk membantu para pencari kerja menemukan peluang karier terbaik dengan mudah dan cepat.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-yellow-400">About</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Contact</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Pricing</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Blog</a></li>
                </ul>
            </div>

            <!-- Candidate -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Candidate</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-yellow-400">Browse Jobs</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Browse Employers</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Candidate Dashboard</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Saved Jobs</a></li>
                </ul>
            </div>

            <!-- Employers -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Employers</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-yellow-400">Post a Job</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Browse Candidates</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Employers Dashboard</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Applications</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-5 text-center text-gray-400">
            &copy; 2025 LowKer. All rights reserved.
        </div>
    </footer>
</body>
</html>
