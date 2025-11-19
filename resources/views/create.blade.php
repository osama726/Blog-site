@extends('layout.app')
@section('title', 'Creat post')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    @parent
    @section('head_form')
        <form action="{{route('store')}}" method="POST" class="container-sm" style="margin-top: 20px">
    @endsection

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">post creator</label>
            <select name="post_creator" class="form-control">
                @foreach ($users as $post_creator)
                    <option value="{{ $post_creator->name }}">{{$post_creator->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
