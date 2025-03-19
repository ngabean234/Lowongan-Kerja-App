<nav class="flex justify-between items-center p-3 bg-gray-800">
    <h1 class="text-xl font-bold text-yellow-400">LowKer</h1>
    <ul class="flex space-x-6">
        <li><x-navlink class="hover:text-yellow-400" href="dashboard" :active="request()->is('dashboard')">Home</x-navlink></li>
        <li><x-navlink class="hover:text-yellow-400" href="#lowongan-section">Lowongan</x-navlink></li>
        <li><x-navlink class="hover:text-yellow-400" href="#komunitas-section">Komunitas</x-navlink></li>
        <li><x-navlink class="hover:text-yellow-400" href="#">Blog</x-navlink></li>
        <li><x-navlink class="hover:text-yellow-400" href="#">about</x-navlink></li>
    </ul>
    <ul>
        @if (Auth::user())
        <a href="{{ route('front.profile') }}" class="flex items-center">
            <p class="username font-medium text-white">Hi, {{ Auth::user()->name }}</p>
            <img src="{{ Auth::user()->profile_photo_url ?? 'default-avatar.png'}}" alt="Profil Icon" class="ml-2 w-6 h-6 rounded-full">
        </a>

        @else
        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}" class="rounded-full p-[14px_24px] bg-[#FF6B2C] font-semibold text-white hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">Sign In</a>
            <a href="{{ route('register') }}" class="rounded-full border border-white p-[14px_24px] font-semibold text-white">Sign Up</a>
        </div>
        @endif
</nav>
