@section('title', $pagetitle )
<x-layout.app :title="$pagetitle">
    <h2>this is <strong>POSTS</strong> view</h2>

    @foreach ($posts as $data)

        <p style="font-size: 25px; font-weight: bold;">{{ $data->title }}</p>
        <p style="font-size: 20px">{{ $data->content }}</p>

        @foreach ( $data->comments as $comment )
            <p style="font-weight: bold">{{ $comment->content }}</p>
        @endforeach
    @endforeach
<hr>
<hr>
<hr>

{{ $posts->links() }}
        {{-- {{ $posts[0]->comments[0]->content }} --}}
</x-layout.app>
