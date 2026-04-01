<nav class="bg-gray-800/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    {{-- <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" /> --}}
                    <h3>Job board</h3>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                        @php
                            $current = "bg-gray-950/50 text-white";
                            $default = "text-gray-300 hover:bg-white/5 hover:text-white";
                        @endphp
                        <a href="{{ route('home') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('/') ? $current : $default }}">Home</a>
                        <a href="{{ route('job.index') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('jobs') ? $current : $default }}">jobs</a>
                        <a href="{{ route('posts.index') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('posts') ? $current : $default }}">Posts</a>
                        <a href="{{ route('about') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('about') ? $current : $default }}">Abut</a>
                        <a href="{{ route('contact') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('contacts') ? $current : $default }}">Contact</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div>
                    @auth
                        <span class="text-white">{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-red-950/80 hover:text-white cursor-pointer">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-950/50 hover:text-white">Login</a>
                        <a href="{{ route('signup') }}" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-950/50 hover:text-white">Sign Up</a>
                    @endauth
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <el-disclosure id="mobile-menu" hidden class="block md:hidden">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <a href="{{ route('home') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('/') ? $current : $default }}">Home</a>
            <a href="{{ route('job.index') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('job') ? $current : $default }}">jobs</a>
            <a href="{{ route('posts.index') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('post') ? $current : $default }}">Posts</a>
            <a href="{{ route('about') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('about') ? $current : $default }}">Abut</a>
            <a href="{{ route('contact') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('contact') ? $current : $default }}">Contact</a>
        </div>
        <div class="border-t border-white/10 pt-4 pb-3">
            <a href="{{ route('login') }}" class="block rounded-md px-3 py-2 text-base font-medium {{ request()->is('login') ? $current : $default }}">Login</a>
            <a href="{{ route('signup') }}" class="block rounded-md px-3 py-2 text-base font-medium {{ request()->is('signup') ? $current : $default }}">Sign Up</a>
        </div>
    </el-disclosure>
</nav>
