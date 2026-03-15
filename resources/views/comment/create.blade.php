@section('form')
    @if ($errors->any())
        <div class="flex items-start gap-3 rounded-lg border border-red-300 bg-red-50 p-4 text-red-800">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @section('form-head')
        <form action="{{ route('comments.store') }}" method="POST">
    @show
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                @section('form-body')
                    {{-- <h2 class="text-base/7 font-semibold text-gray-900">CREATE NEW COMMENT</h2> --}}
                    <p class="mt-1 text-sm/6 text-gray-600">Use this form to create a new comment to the post.</p>
                @show

                <input type="hidden" name="post_id" value="{{ $post->id }}"/>

                <div class="sm:col-span-3">
                    <label for="author" class="block text-sm/6 font-medium text-gray-900">Your name</label>
                    <div class="mt-2">
                        <input id="author" type="text" name="author" autocomplete="family-name"
                            @section('author-value')
                                value="{{ old('author') }}"
                            @show
                            class=" {{ $errors->has('author') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                        />
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="content" class="block text-sm/6 font-medium text-gray-900">Comment</label>
                    <div class="mt-2">
                        <textarea id="content" name="content" rows="3" class=" {{ $errors->has('content') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">@section('content-value'){{old('content')}}@show</textarea>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </div>
        </div>
    </form>
@show
