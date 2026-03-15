@extends('comment.create')
@section('title', $pagetitle )
@section('form')
    <x-layout.app :title="$pagetitle" >
        @parent

        @section('form-head')
            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
            @method('PUT')
        @endsection

        @section('form-body')
            <p class="mt-1 text-sm/6 text-gray-600">Use this form to edit your comment.</p>
        @endsection

        @section('author-value')
            value="{{ old('author', $comment->author) }}"
        @endsection
        @section('content-value'){{ old('content', $comment->content) }}@endsection
    </x-layout.app>
@endsection
