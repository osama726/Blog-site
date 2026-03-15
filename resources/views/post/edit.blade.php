{{-- @section('title', $pagetitle ) --}}
@extends('post.create')
{{-- <x-layout.app :title="$pagetitle" > --}}
    @section('form')
        @parent

        @section('form-head')
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @method('PUT')
        @endsection

        @section('form-body')
            <h2 class="text-base/7 font-semibold text-gray-900">Edit your POST ( {{ $post->title }} )</h2>
            <p class="mt-1 text-sm/6 text-gray-600">Use this form to edit your post.</p>
        @endsection
        @section('title-value')
            value="{{ old('title', $post->title) }}"
        @endsection
        @section('author-value')
            value="{{ old('author', $post->author) }}"
        @endsection
        @section('content-value'){{ old('content', $post->content) }}@endsection
        @section('published-value')
            {{ old('published') || ( !old() && $post->published ) ? 'checked' : '' }}
        @endsection
    @endsection
{{-- </x-layout.app> --}}
