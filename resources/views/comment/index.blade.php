@section('title', $pagetitle)
<x-layout.app :title="$pagetitle">
    <h2>This is comment index view</h2>

    @foreach ($comments as $comment)
        <p>{{ $comment->content }}</p>
        {{-- <p>{{ $comment->post }}</p> --}}
        {{-- <a href="/post/{{ $comment->posts->id }}">{{ $comment->posts->title }}</a> --}}
        <a href="{{ route('posts.show', $comment->post->id) }}">{{ $comment->post->title }}</a>
        <hr>
    @endforeach

    {{ $comments->links() }}
</x-layout.app>
