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
                <li><a href="#lowongan-section" class="hover:text-yellow-400">Lowongan</a></li>
                <li><a href="#perusahaan-section" class="hover:text-yellow-400">Perusahaan</a></li>
                <li><a href="#" class="hover:text-yellow-400">Employers</a></li>
                <li><a href="#" class="hover:text-yellow-400">Blog</a></li>
            </ul>
            <div>
                <a href="{{ route('login') }}" class="bg-yellow-400 text-gray-900 px-4 py-2 rounded" aria-label="Sign In">Masuk</a>
                <a href="{{ route('company.login') }}" class="text-yellow-400 mr-4" aria-label="Perusahaan">Untuk Perusahaan</a>
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

        <!-- Featured Jobs Section -->
        <section id="lowongan-section" class="container mx-auto mt-10 pb-10 p-10">
            <h2 class="text-3xl font-bold mb-6">Lowongan <span class="text-yellow-400">Terbaru</span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Featured Job Cards -->
                @forelse($featuredJobs as $job)
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition">
                    <div class="flex items-center mb-3">
                        <div class="bg-gray-700 rounded-full p-2 mr-3">
                            @if($job->company && $job->company->company_logo)
                                <img src="{{ asset('company/' . $job->company->company_logo) }}" alt="{{ $job->company->name }}" class="object-contain h-10">
                            @else
                                <div class="bg-light rounded-full p-2 flex justify-center items-center">
                                    <i class="bi bi-building text-yellow-400 text-xl"></i>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">{{ $job->name }}</h3>
                            <p class="text-gray-400">{{ $job->company->name ?? 'Perusahaan' }} • {{ $job->city->name ?? 'Lokasi tidak tersedia' }}</p>
                        </div>
                    </div>
                    <p class="mt-2 text-sm bg-yellow-400 text-gray-900 inline-block px-2 py-1 rounded">{{ $job->jobType->name ?? 'Full Time' }}</p>
                    <p class="mt-2 text-xs text-gray-400 line-clamp-2">{{ Str::limit($job->description, 100) }}</p>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-xs text-gray-400">{{ $job->created_at->diffForHumans() }}</span>
                        <a href="{{ route('jobs.public.show', $job) }}" class="text-yellow-400 hover:underline text-sm">Lihat Detail</a>
                    </div>
                </div>
                @empty
                <div class="col-span-4 text-center py-8 bg-gray-800 rounded-lg">
                    <i class="bi bi-briefcase text-yellow-400 text-4xl mb-2"></i>
                    <p class="text-lg mb-3">Belum ada lowongan pekerjaan tersedia</p>
                    <p class="text-gray-400">Silakan cek kembali nanti untuk melihat lowongan terbaru</p>
                </div>
                @endforelse
            </div>
            {{-- <div class="text-right mt-6">
                <a href="{{ route('search.jobs') }}" class="text-yellow-400 hover:underline">Lihat semua lowongan &rarr;</a>
            </div> --}}
        </section>

        <!-- Featured Companies Section -->
        <section id="perusahaan-section" class="container mx-auto mt-10 pb-10 p-10">
            <h2 class="text-3xl font-bold mb-6">Perusahaan <span class="text-yellow-400">Terbaru</span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Featured Company Cards -->
                @forelse($featuredCompanies as $company)
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:bg-gray-700 transition">
                    <div class="flex items-center mb-3">
                        <div class="bg-gray-700 rounded-full p-2 mr-3">
                            @if($company->company_logo)
                                <img src="{{ asset('company/' . $company->company_logo) }}" alt="{{ $company->name }}" class="object-contain h-10">
                            @else
                                <div class="bg-light rounded-full p-2 flex justify-center items-center">
                                    <i class="bi bi-building text-yellow-400 text-xl"></i>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">{{ $company->name }}</h3>
                            <p class="text-gray-400">{{ $company->city->name ?? 'Lokasi tidak tersedia' }}</p>
                            <p class="text-gray-400">Lowongan: {{ $company->jobs->count() }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-4 text-center py-8 bg-gray-800 rounded-lg">
                    <i class="bi bi-briefcase text-yellow-400 text-4xl mb-2"></i>
                    <p class="text-lg mb-3">Belum ada perusahaan tersedia</p>
                    <p class="text-gray-400">Silakan cek kembali nanti untuk melihat perusahaan terbaru</p>
                </div>
                @endforelse
            </div>
            {{-- <div class="text-right mt-6">
                <a href="{{ route('search.jobs') }}" class="text-yellow-400 hover:underline">Lihat semua perusahaan &rarr;</a>
            </div> --}}
        </section>
    </main>

    <!-- Footer -->
    <x-footer></x-footer>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
        </script>
</body>
</html>
