<x-layout>
    <x-slot:title></x-slot:title>
    <main>
        <div>
            <form action="{{ route('search.jobs') }}" method="GET" class="flex flex-wrap gap-2 mb-5 shadow-md mt-8">
                <input type="text" name="keyword" class="flex-grow p-2 text-sm text-gray-900 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800" placeholder="Search Job" aria-label="Search Job">
                <input type="text" name="location" class="flex-grow p-2 text-sm text-gray-900 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800" placeholder="Search Location" aria-label="Search Location">
                <button type="submit" class="w-full sm:w-auto bg-yellow-500 text-white px-4 py-3 text-sm font-medium rounded-lg hover:bg-yellow-700 transition focus:ring-2 focus:ring-yellow-500" aria-label="Find Jobs">Find Job</button>
            </form>
        </div>
        <div class="info-section mt-4 mb-8">
            <div class="container">
                <div class="row text-star">
                    <div class="col-md-6 mb-3">
                        <h5 class="mb-3">Recommended for you
                            <i class="bi bi-info-circle"></i>
                        </h5>
                        <div class="flex items-center gap-12 rounded-lg p-6 shadow-md border border-gray-300">
                            <p><a href="#"><u>Update your profile</u></a> or start searching for jobs to get
                                personalised job recommendations here.</p>
                        </div>
                    </div>
                    <div class="col text-star">
                        <div class="row-md-6">
                            <h5 class="mb-3">Saved searches
                                <i class="bi bi-info-circle mb-3"></i>
                            </h5>
                            <div class="flex items-center gap-12 rounded-lg p-6 shadow-md border border-gray-300">
                                <p>Utilize the 'Save Search' button below the search results to store your search and get notified about every new job posting.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 class="mb-3">Saved jobs
                            <i class="bi bi-info-circle"></i>
                        </h5>
                        <div class="flex items-center gap-12 rounded-lg p-6 shadow-md border border-gray-300">
                            <p>Click the 'Save' button on each job listing to bookmark it for later. You can then view your saved listings on all your devices.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between p-8 text-white rounded-lg shadow-md mt-8" style="background-image: url('{{ asset('images/salary2.jpg') }}'); background-size: cover; background-position: center;">
                <div class="w-1/2 p-4">
                    <h2 class="text-2xl font-bold">All the juicy salary news in your industry</h2>
                    <a href="#" class="mt-4 inline-block bg-white text-gray-600 py-2 px-4 rounded-lg">Go to Community</a>
                </div>
                <div class="w-1/2 p-4 text-center">
                    <img src="{{ asset('images/salary.png') }}" alt="Description of the image" class="w-32 h-32 mx-auto">
                    <a href="#" class="mt-4 inline-block bg-white text-gray-600 py-2 px-4 rounded-lg">Hire for FREE</a>
                </div>
            </div>
            
            <div class="mt-8">
                <h4 class="text-lg font-semibold">Quick search</h4>
                <div class="flex flex-wrap gap-2 mt-2">
                    <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Accounting</a>
                    <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Education & Training</a>
                    <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Government & Defence</a>
                    <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Healthcare & Medical</a>
                    <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Sales</a>
                    <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Medical</a>
                    <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Construction</a>
                    <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">Mecanic</a>
                    <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">HRD</a>
                    <a href="#" class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg">View all</a>
                </div>
            </div>
        </div>
    </main>

</x-layout>