<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::latest()->cursorPaginate(5); // get all posts from database
        return view("post.index", ['posts' => $data, "pagetitle" => 'Posts page']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', ["pagetitle" => 'Create Post'] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // print_r($request->all());
        // $post = new Post();
        // $post->title = $request->input('title');
        // $post->content = $request->input('content');
        // $post->author = $request->input('author');
        // $post->published = $request->has('published');
        // $post->save();

        // Post::create([
        //     'title' => $request->input('title'),
        //     'content' => $request->input('content'),
        //     'author' => $request->input('author'),
        //     'published' => $request->has('published')
        // ]);
        Post::create($request->all());

        return to_route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post, "pagetitle" => 'Single Post' ] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post, "pagetitle" => 'Edit Post' ] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {

        // $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->author = $request->input('author');
        $post->published = $request->has('published');
        $post->save();
        return to_route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
