<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(){

        $data = Tag::all();
        return view("tag.index", ['tags' => $data], ["pagetitle" => 'Tags page' ]);
    }

    public function create(){
        Tag::create([ // creat post in database table
            'title' => 'Laravel',
        ]);

        // return redirect('/posts');
        return to_route('tag.index');
    }

    public function testManyToMany(){
        // $post1 = Post::find(1);
        // $post4 = Post::find(4);

        // $post1->tags()->attach([2,3]);
        // $post4->tags()->attach([1]);

        // return response()->json([
        //     'post1_tags' => $post1->tags,
        //     'post4_tags' => $post4->tags
        // ]);


        // $tag = Tag::find(1);
        $tag = Tag::find(2);
        // $tag = Tag::find(3);

        // $tag->posts()->attach([5]);
        // $tag->posts();

        return response()->json([
            'tag' => $tag->title,
            'posts' => $tag->posts
        ]);
    }

    // function destroy(Post $post){
    //     $post->delete();
    //     // Post::destroy( $post->id );
    //     // return redirect('/posts');
    //     return to_route('post.index');
    // }

}
