@extends('layout.app')
@section('title', 'Edit Post')

@section('content')
    @parent
    @section('head_form')
        {{-- @foreach ($data as $post_crearot) --}}
            <form action="{{route('show_post', $post->id)}}" method="POST" class="container-sm" style="margin-top: 20px">
        {{-- @endforeach --}}
        @method('put')
    @endsection

    @section('form_content')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Track</label>
            <input name="title" value="{{$post->track}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Technology</label>
            <textarea name="descriptionnn" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post->technology}}</textarea>
        </div>
    @endsection


    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">post creator</label>
        <select name="post_creator" class="form-select" aria-label="Default select example" id="exampleInputPassword1">
            @foreach ($data as $post_crearot)
                <option value="{{$post_crearot['name']}}">{{$post_crearot['name']}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
