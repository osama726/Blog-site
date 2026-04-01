@section('title', 'Sign Up')
<x-layout.headless_app>
    <div class="min-h-screen flex items-center justify-center">

        @if(session('success'))
            <div class="flex items-start gap-3 rounded-lg border border-green-300 bg-green-50 p-4 text-green-800 mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8 border border-gray-200">

            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">
                Login to your account
            </h2>

            @if ($errors->any())
                <div class="flex items-start gap-3 rounded-lg border border-red-300 bg-red-50 p-4 text-red-800">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email
                    </label>

                    <input
                        id="email"
                        name="email"
                        type="text"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
                        placeholder="you@example.com"
                        value="{{ old('email') }}"
                    >
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password
                    </label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
                        placeholder="••••••••"
                    >
                </div>

                <button
                    class="w-full bg-indigo-900 text-white py-2 rounded-lg hover:bg-indigo-700 transition"
                >
                    Login
                </button>

            </form>

            <p class="text-sm text-gray-500 text-center mt-6">
                Don't have an account?
                <a href="{{ route('signup') }}" class="text-indigo-700 font-medium hover:underline">
                    Sign up
                </a>
            </p>

        </div>

    </div>
</x-layout.headless_app>

