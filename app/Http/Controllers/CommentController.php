<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return to_route('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return to_route('posts.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        // dd($request->all());
        $post = Post::findOrFail($request->input('post_id'));

        $post->comments()->create([
            'author' => $request->input('author'),
            'content' => $request->input('content')
        ]);
        return back()->with('success', 'Comment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return to_route('posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $post = Post::findOrFail($comment->post_id);

        return view('comment.edit', ['comment' => $comment, 'post' => $post, "pagetitle" => 'Edit Comment' ] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $post = Post::findOrFail($request->input('post_id'));

        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->post_id = $request->input('post_id');
        $comment->save();

        return to_route('posts.show', $post)->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully.');
    }
}
