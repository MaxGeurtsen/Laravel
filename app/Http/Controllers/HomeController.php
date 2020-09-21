<?php

namespace App\Http\Controllers;

use App\posts;
use App\users;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $posts = users::all();


        return view('home',[
            'posts' => $posts
        ]);
    }
}
