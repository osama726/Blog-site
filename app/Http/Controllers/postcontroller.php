<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

use function PHPUnit\Framework\isNull;

class postcontroller extends Controller
{
    public function firstindex(){
        $postsfromdb = post::all();
        // dd($postsfromdb);
        // $detalse =[
        //     ['id' => 1, 'name' => 'osama',    'track' => 'back end',  'technology' => 'php & laravel'],
        //     ['id' => 2, 'name' => 'ahmed',    'track' => 'back end',  'technology' => 'js & node.js'],
        //     ['id' => 3, 'name' => 'mohamed',  'track' => 'front end', 'technology' => 'js & react'],
        //     ['id' => 4, 'name' => 'sayd',     'track' => 'mobile',    'technology' => 'flater'],
        // ];
        return view ('contact', ['data' => $postsfromdb]);
    }

    public function show(post $post){   // route model binding بتوفر في كتابة الكود
        // $singleshowdb = post::findorfail($post); // findorfail علشان تظبط موضوع ال 404not found

        // if(is_Null($singleshowdb)){
        //     return to_route('main.page');
        // }
        // $singleshowdb2 = post::where('id', $post)->first();
        // $singleshowdb3 = post::where('id', $post)->get();
        return view ('post', ['posts' => $post]);
    }

    public function create(){
        $createdb = User::all();
        // dd($createdb);
        // $detalse =[
        //     ['id' => 1, 'name' => 'osama'],
        //     ['id' => 2, 'name' => 'ahmed'],
        //     ['id' => 3, 'name' => 'mohamed'],
        //     ['id' => 4, 'name' => 'sayd'],
        // ];
        return view("create", ['users' => $createdb]);
    }


    public function store(){
        request()->validate([
            'title' => ['required', 'min:3'],
            'descriptionnn' => ['required', 'min:3'],
            // 'post_creator' => ['required', 'exists:users,id']
        ]);

        $name = request()->post_creator;
        $track = request()->title;
        $technology = request()->descriptionnn;

        // $post = new Post(); // case 1 of mass assignment
        // $post->name = $name;
        // $post->track = $track;
        // $post->technology = $technology;
        // $post->save();

        post::create([ // case 2 of mass assignment
            'name' => $name,
            'track' => $track,
            'technology' => $technology,
        ]);
        return to_route('main.page');
    }

    public function edit(post $post){
        $editdb = User::all();
        // $detalse =[
        //     ['id' => 1, 'name' => 'osama',    'track' => 'back end',  'technology' => 'php & laravel'],
        //     ['id' => 2, 'name' => 'ahmed',    'track' => 'back end',  'technology' => 'js & node.js'],
        //     ['id' => 3, 'name' => 'mohamed',  'track' => 'front end', 'technology' => 'js & react'],
        //     ['id' => 4, 'name' => 'sayd',     'track' => 'mobile',    'technology' => 'flater'],
        // ];


        return view('edit_post', ['data' => $editdb, 'post' => $post]);
    }

    public function show_post($postid){

        // return view('contact');
        // $data = $_POST;
        // $data = request()->all();
        // dd($data);
        $name = request()->post_creator;
        $track = request()->title;
        $technology = request()->descriptionnn;

        $singleshowdb = post::find($postid);
        $singleshowdb->update([
            'name' =>       $name,
            'track' =>      $track,
            'technology' => $technology,
        ]);
        return to_route('view', $postid);
        // return 'view';
    }

    public function delete($postid){

        // return view('contact');
        // $data = $_POST;
        // $data = request()->all();
        // dd($data);
        $singleshowdb = post::find($postid);
        $singleshowdb->delete();

        return to_route('main.page');
    }
}
