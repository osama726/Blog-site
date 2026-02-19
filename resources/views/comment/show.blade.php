@section('title', $pagetitle)
<x-layout.app :title="$pagetitle">
    <h2 style="font-size: larger">{{ $comment->content }}</h2>
    <p>This comment for <strong>{{ $comment->author }}</strong>
        and belongs to
        <a href="{{ route('posts.show', $comment->Post->id) }}" >
            <strong>{{ $comment->Post->title }}</strong>
        </a>
    </p>
</x-layout.app>
