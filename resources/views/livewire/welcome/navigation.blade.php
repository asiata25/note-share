<nav class="-mx-3 flex flex-1 gap-4 justify-end">
    @auth
        <a href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Dashboard
        </a>
    @else
        <x-button href="{{ route('login') }}" outline secondary label="Log in" />

        @if (Route::has('register'))
            <x-button icon="sparkles" href="{{ route('register') }}" secondary label="Register" />
        @endif
    @endauth
</nav>
