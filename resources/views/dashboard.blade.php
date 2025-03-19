<x-layout>
    <x-slot:title></x-slot:title>
    <main>
        <div>
            <form action="{{ route('search.jobs') }}" method="GET" class="flex flex-wrap gap-2 mb-5 shadow-md mt-8">
                <input type="text" name="keyword" class="flex-grow p-2 text-sm text-gray-900 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800" placeholder="Cari Pekerjaan" aria-label="Cari Pekerjaan">
                <input type="text" name="location" class="flex-grow p-2 text-sm text-gray-900 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800" placeholder="Cari Lokasi" aria-label="Cari Lokasi">
                <button type="submit" class="w-full sm:w-auto bg-yellow-500 text-white px-4 py-3 text-sm font-medium rounded-lg hover:bg-yellow-700 transition focus:ring-2 focus:ring-yellow-500" aria-label="Cari Pekerjaan">Cari Pekerjaan</button>
            </form>
        </div>

        <!-- Job Listings Section -->
        <div class="mt-8">
            <h2 id="lowongan-section" class="text-2xl font-bold mb-6">Lowongan Pekerjaan Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($jobs as $job)
                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center mr-4">
                                @if($job->company && $job->company->company_logo)
                                    <img src="{{ asset('company/' . $job->company->company_logo) }}"
                                         alt="{{ $job->company->name }}"
                                         class="w-10 h-10 object-contain">
                                @else
                                    <i class="bi bi-building text-gray-400 text-2xl"></i>
                                @endif
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-900">{{ $job->name }}</h3>
                                <p class="text-gray-600">{{ $job->company->name ?? 'Nama Perusahaan' }}</p>
                            </div>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-gray-600">
                                <i class="bi bi-geo-alt mr-2"></i>
                                <span>{{ $job->city->name ?? 'Lokasi' }}</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="bi bi-briefcase mr-2"></i>
                                <span>{{ $job->jobType->name ?? 'Jenis Pekerjaan' }}</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="bi bi-cash mr-2"></i>
                                <span>{{ $job->salary_range ?? 'Gaji Kompetitif' }}</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-4">
                            <a href="#"
                               class="text-blue-600 hover:text-blue-800">
                                <i class="bi bi-info-circle"></i> Detail
                            </a>
                            <a href="#"
                               class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                                <i class="bi bi-send"></i> Lamar Sekarang
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <i class="bi bi-inbox text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-600">Tidak ada lowongan pekerjaan saat ini.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $jobs->links() }}
            </div>
        </div>

        <div id="komunitas-section" class="flex justify-between p-8 text-white rounded-lg shadow-md mt-8" style="background-image: url('{{ asset('images/salary2.jpg') }}'); background-size: cover; background-position: center;">
            <div class="w-1/2 p-4">
                <h2 class="text-2xl font-bold">Informasi Gaji Terbaru di Industri Anda</h2>
                <p class="mt-2">Dapatkan informasi gaji terbaru untuk membantu Anda dalam negosiasi.</p>
                <a href="#" class="mt-4 inline-block bg-white text-gray-600 py-2 px-4 rounded-lg">Kunjungi Komunitas</a>
            </div>
            <div class="w-1/2 p-4 text-center">
                <img src="{{ asset('images/salary.png') }}" alt="Description of the image" class="w-32 h-32 mx-auto">
                <a href="#" class="mt-4 inline-block bg-white text-gray-600 py-2 px-4 rounded-lg">Rekrut Gratis</a>
            </div>
        </div>

        <div class="mt-8">
            <h4 class="text-lg font-semibold">Pencarian Cepat</h4>
            <div class="flex flex-wrap gap-2 mt-2">
                <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Akuntansi</a>
                <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Pendidikan & Pelatihan</a>
                <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Pemerintahan & Pertahanan</a>
                <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Kesehatan & Medis</a>
                <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Penjualan</a>
                <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Medis</a>
                <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Konstruksi</a>
                <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Mekanik</a>
                <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">SDM</a>
                <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Lihat Semua</a>
            </div>
        </div>
    </div>


    </main>
</x-layout>
