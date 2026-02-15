<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return  view('home/index');
    }

    public function about(){
        return  view('about', ["pagetitle" => 'About page' ]);
    }

    public function contact(){
        return  view('contact', ["pagetitle" => 'Cnotact page' ]);
    }

}
