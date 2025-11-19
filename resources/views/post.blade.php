@extends('layout.app')
@section('title', "Bootstrap demo")
{{-- Start description --}}
    @section('content')
        <div class="container">
            <div class="card" style="margin-top: 25px">
                <h5 class="card-header">{{ $posts->name }}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{ $posts->name }}'s path is {{ $posts['track'] }}</h5>
                    <p class="card-text">{{ $posts['description'] }}</p>
                </div>
            </div>
        </div>
    @endsection
{{-- End description --}}

