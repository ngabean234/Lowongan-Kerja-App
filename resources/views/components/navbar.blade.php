<nav class="flex justify-between items-center p-3 bg-gray-800">
    <h1 class="text-xl font-bold text-yellow-400">LowKer</h1>
    <ul class="flex space-x-6">
        <li><x-navlink href="welcome" :active="request()->is('welcome')">Home</x-navlink></li>
        <li><x-navlink href="pages" :active="request()->is('pages')">Pages</x-navlink></li>
        <li><x-navlink href="jobs" :active="request()->is('jobs')">Jobs</x-navlink></li>
        <li><x-navlink href="employers" :active="request()->is('employers')">Employers</x-navlink></li>
        <li><x-navlink href="Blog" :active="request()->is('Blog')">Blog</x-navlink></li>
    </ul>
    <ul>
        @if (Auth::user())
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <p class="username font-medium text-white">Hi, {{ Auth::user()->name }}</p>
        </a>
        @else
        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}" class="rounded-full p-[14px_24px] bg-[#FF6B2C] font-semibold text-white hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">Sign In</a>
            <a href="{{ route('register') }}" class="rounded-full border border-white p-[14px_24px] font-semibold text-white">Sign Up</a>
        </div>
        @endif
</nav>