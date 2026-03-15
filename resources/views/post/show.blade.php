@section('title', $pagetitle )
@extends('comment.create')

@section('form')
    <x-layout.app :title="$pagetitle">
        @if(session('success'))
            <div class="flex items-start gap-3 rounded-lg border border-green-300 bg-green-50 p-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        {{-- Post View --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 mt-4">

            <div class="flex items-center justify-between mb-3">
                <h2 class="text-xl font-bold text-gray-900">
                    {{ $post->title }}
                </h2>

                <div class="text-sm text-gray-400">
                    {{ $post->created_at->diffForHumans() }}
                    <div class="mt-3 text-sm text-gray-500">
                        {{ $post->comments->count() }} comments
                    </div>
                </div>
            </div>

            <p class="text-gray-700 leading-relaxed mb-4">
                {{ $post->content }}
            </p>

            <div class="text-sm text-gray-500">
                Written by <span class="font-semibold">{{ $post->author }}</span>
            </div>
        </div>

        {{-- Comment Form --}}
        <div class="mt-3" x-data="{ open: false }" x-init="open = {{ $errors->any() ? 'true' : 'false' }}">

            <button
                @click="open = !open"
                class="bg-indigo-900 text-white px-4 py-2 rounded hover:bg-indigo-700 cursor-pointer"
            >
                Add Comment
            </button>

            <div x-show="open" x-transition class="mt-4">
                @parent
            </div>
        </div>

        {{-- Comments Section --}}
        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-4">Comments</h3>

            <ul class="space-y-4">
                @foreach ($post->comments as $comment)
                    <li class="bg-white p-4 rounded-xl shadow-sm border border-gray-200">

                        <div class="flex items-center justify-between mb-2">
                            <span class="font-semibold text-gray-800">
                                {{ $comment->author }}
                            </span>

                            <span class="text-xs text-gray-400">
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <p class="text-gray-600 leading-relaxed">
                            {{ $comment->content }}
                        </p>
                        <div>
                            <a href="{{ route('comments.edit', $comment->id) }}" class="text-blue-500 hover:text-gray-500">Edit</a>
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-gray-500 cursor-pointer">Delete</button>
                            </form>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>

    </x-layout.app>


<script>

document.querySelectorAll('.delete-form').forEach(form => {

    form.addEventListener('submit', function(e) {

        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
            }

        });

    });

});

</script>

@endsection
