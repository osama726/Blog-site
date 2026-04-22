@section('title', $pagetitle )
<x-layout.app :title="$pagetitle">
    @section('form')
        @section('form-head')
            <form action="{{ route('posts.store') }}" method="POST">
        @show
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    @section('form-body')
                        <h2 class="text-base/7 font-semibold text-gray-900">CREATE NEW POST</h2>
                        <p class="mt-1 text-sm/6 text-gray-600">Use this form to create a new post to the blog.</p>
                    @show

                    @if ($errors->any())
                        <div class="flex items-start gap-3 rounded-lg border border-red-300 bg-red-50 p-4 text-red-800">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <input type="hidden" name="id" value="{{ $post->id ?? '' }}"/>
                    <input type="hidden" name="user_id" value="{{ auth()->id() ?? '' }}"/>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-full">
                            <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                            <div class="mt-2">
                                <input id="title" type="text" name="title" autocomplete="given-name"
                                    @section('title-value') value="{{ old('title') }}" @show
                                    class=" {{ $errors->has('title') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                />
                                @error('title')
                                    <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="content" class="block text-sm/6 font-medium text-gray-900">Content</label>
                            <div class="mt-2">
                                <textarea id="content" name="content" rows="3" class=" {{ $errors->has('content') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">@section('content-value'){{old('content')}}@show</textarea>
                            </div>
                            <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the article.</p>
                        </div>

                            <div class="col-span-full">
                                <div class="flex gap-3">
                                    <div class="flex h-6 shrink-0 items-center">
                                        <div class="group grid size-4 grid-cols-1">
                                            <input id="published" type="checkbox" name="published"
                                                @section('published-value')
                                                    {{ old('published') ? 'checked' : '' }}
                                                @show
                                                value="{{ 'published' ? '1' : '0' }}" aria-describedby="published-description" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto"
                                            />
                                            <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="text-sm/6">
                                        <label for="published" class="font-medium text-gray-900">Is published ?</label>
                                        <p id="published-description" class="text-gray-500">Do you want it published or saved as a draft?</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('posts.index') }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    @show

</x-layout.app>
