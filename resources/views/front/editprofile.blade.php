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
                    <label for="profile_photo" class="form-label fw-medium">
                        <i class="bi bi-image me-2"></i>Foto Profil
                    </label>

                    @if(Auth::user()->profile_photo)
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <div class="bg-light rounded-3 p-2 shadow-sm d-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                                <img src="{{ asset(Auth::user()->profile_photo) }}"
                                     class="img-fluid rounded object-fit-contain" 
                                     alt="Foto Profil">
                            </div>
                            <div class="ms-3">
                                <span class="badge bg-success">Foto Profil Aktif</span>
                            </div>
                        </div>
                    </div>
                    @endif

                    <input type="file"
                           class="form-control @error('profile_photo') is-invalid @enderror"
                           id="profile_photo"
                           name="profile_photo"
                           accept="image/*">
                    <div class="form-text">
                        <i class="bi bi-info-circle me-1"></i>Pilih gambar dengan format JPG, PNG, atau GIF (maks 2MB)
                    </div>
                    @error('profile_photo')
                        <div class="invalid-feedback">{{ $message }}</div>
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
