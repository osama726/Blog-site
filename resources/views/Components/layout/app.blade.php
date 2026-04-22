<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Job board')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        {{-- Bootstrap --}}
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> --}}

        {{-- Tailwind --}}
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    </head>

    <body>

        <div class="min-h-full">
            {{-- Navbar --}}
            <x-layout.nav /> {{-- <--دي بتاعت استدعاء الناف بار  --}}

            @if (isset($title))
                <header class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

                        <div class="flex items-center justify-between">

                            <h1 class="text-3xl font-bold tracking-tight text-white">
                                {{ $title }}
                            </h1>

                            @if(isset($postcreate) && $postcreate == true)
                                <div >
                                    <a href="{{ route('posts.create') }}" class="rounded-md bg-indigo-900 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add new post</a>
                                </div>
                            @endif

                        </div>

                    </div>
                </header>

            @endif
            <main>
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $slot }} {{-- اي حاجة هكتبها جوه تاج الاستدعاء هيبقي مكانها هنا --}}
                </div>
            </main>
        </div>

        {{-- Footer --}}
        {{-- <x-layout.footer /> --}}

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        {{-- Bootstrap --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> --}}
    </body>
</html>
