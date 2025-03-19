<x-layout>
    <x-slot:title></x-slot:title>
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold">Profil Saya</h1>

        <div class="bg-white p-5 rounded-lg shadow-md mt-5">
            <div class="flex items-center mb-4">
                <div style="width: 64px; height: 64px;" class="rounded-full overflow-hidden bg-light d-flex align-items-center justify-content-center">
                    @if(Auth::user()->profile_photo)
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="Profil Icon" class="img-fluid">
                    @else
                        <i class="bi bi-person-circle fs-1 text-secondary"></i>
                    @endif
                </div>
                <div class="ml-4">
                    <h2 class="text-gray-800 font-semibold">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <div class="mt-5">
                <h3 class="font-bold text-gray-600">Detail Profil:</h3>
                <p class="font-bold text-gray-600"><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                <p class="font-bold text-gray-600"><strong>Email:</strong> {{ Auth::user()->email }}</p>
               <!--- <p><strong>Foto Profil:</strong> <img src="{{ Auth::user()->profile_photo_url ?? 'default-avatar.png' }}" alt="Profil" class="w-16 h-16 rounded-full"></p> --->
            </div>

            <div class="mt-5">
                <a href="{{ route('front.editprofile')}}" class="btn btn-primary">Edit Profil</a>
            </div>
        </div>
</x-layout>
