<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(){
        $data = Comment::all();
        return view("comment.index", ['comments' => $data], ["pagetitle" => 'Comments page' ]);
    }

    public function create(){
        // Comment::create([ // creat Comment in database table
        //     'author' => 'ahmed',
        //     'content' => 'this comment for fifth post.',
        //     'Post_id' => 5
        // ]); // for test

        Comment::factory(10)->create(); // create 7 comments using factory
        return response(['message' => 'successfully created comment'], status: 201);
    }

    public function show(Comment $comment){ // كتابة اسم الموديل في البراميتار بيغني عن الخطوات الي تحت دي كلها وبيعملها تلقائي
        // $Comment = Comment::find($post); // ممكن استهدم دي لو مكتبتش اسم الموديل في البراميتار
        // $Comment = Comment::findOrFail( $post ); // نفس الكلام بس هنا بيزيد انه بيقدر يهندل اليرور لو مثلا بعت اي دي مش موجود هيوديني علي صفحة ال 404 بدل ميطلع ايرور
        return view('comment.show', ['comment' => $comment, "pagetitle" => 'Single Comment' ] );
    }
}
