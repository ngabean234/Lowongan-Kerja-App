<x-layout>
    <x-slot:title>Edit Profil</x-slot:title>
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold">Edit Profil</h1>

        <div class="bg-white p-5 rounded-lg shadow-md mt-5">
            <form action="{{ route('front.updateprofile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Menandakan bahwa ini adalah pembaruan -->

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text"
                           class="font text-gray-700"
                           id="name"
                           name="name"
                           value="{{ Auth::user()->name }}"
                           required
                           class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                           placeholder="Nama Anda">
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email"
                           class="font text-gray-700"
                           id="email"
                           name="email"
                           value="{{ Auth::user()->email }}"
                           required
                           class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                           placeholder="Email Anda">
                    @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="profile_picture" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                    <input type="file"
                           class="font text-gray-700"
                           id="profile_picture"
                           name="profile_picture"
                           accept="image/*"
                           class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @error('profile_picture')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <button type="submit" class="rounded-full bg-blue-500 text-white px-4 py-2">Simpan Perubahan</button>
                    <a href="{{ route('front.profile') }}" class="rounded-full bg-yellow-500 text-white px-4 py-2 ml-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
