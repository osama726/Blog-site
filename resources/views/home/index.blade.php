<x-layout.app>
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <h1 style="text-align: center" class="text-3xl font-bold underline mt-5">Welcome to the world of work</h1>
</x-layout.app>

