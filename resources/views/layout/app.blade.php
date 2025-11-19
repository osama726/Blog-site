<!doctype html> {{-- the master page --}}
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        {{-- Start navigation bar --}}
            @include('layout.navbar')
        {{-- End navigation bar --}}

        {{-- Start button bar --}}
            @yield('button_bar')
        {{-- End button bar --}}

        {{-- Start content --}}
            @section('content')
                @yield('head_form')
                    @csrf
                    @section('form_content')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Track</label>
                            <input name="title" value="{{old('title')}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Technology</label>
                            <textarea name="descriptionnn" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('descriptionnn')}}</textarea>
                        </div>
                    @show

                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                {{-- </form> --}}
            @show
        {{-- End content --}}

        {{-- Start content --}}
            {{-- @yield('content') --}}
        {{-- End content --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
