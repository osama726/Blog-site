@section('title', $pagetitle)
@if (auth()->user()->role === 'admin' || auth()->user()->role === 'editor')
    @php $role = true; @endphp
@else
    @php $role = false; @endphp
@endif
<x-layout.app :title="$pagetitle" :postcreate="$role">
    @if(session('success'))
        <div class="flex items-start gap-3 rounded-lg border border-green-300 bg-green-50 p-4 text-green-800">
            {{ session('success') }}
        </div>
    @endif
    @if(session('fail'))
        <div class="flex items-start gap-3 rounded-lg border border-red-300 bg-red-50 p-4 text-red-800">
            {{ session('fail') }}
        </div>
    @endif

    @foreach ($posts as $data)
            <div class="flex justify-between items-center border-b border-gray-300 py-4">
                <div>
                    <a href="{{ route('posts.show', $data->id) }}" style="font-size: 25px; font-weight: bold;">{{ $data->title }}</a>
                    <p style="font-size: 20px; margin-top: -8px;">{{ $data->user->name }}</p>
                </div>

                @if (auth()->user()->role === 'admin' || auth()->user()->role === 'editor')
                    <div>
                        <a href="{{ route('posts.edit', $data->id) }}" class="text-blue-500 hover:text-gray-500">Edit</a>

                        @if (auth()->user()->role === 'admin')
                            <form action="{{ route('posts.destroy', $data->id) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-gray-500 cursor-pointer">Delete</button>
                            </form>
                        @endif

                    </div>
                @endif

            </div>
        @endforeach

    {{ $posts->links() }}
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
