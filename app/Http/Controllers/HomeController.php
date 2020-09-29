<?php

namespace App\Http\Controllers;

use App\categories;
use App\posts;
use App\users_posts;
use App\votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $posts = posts::all();
        $sort = $posts->sortByDesc('created_at');
        $votes = votes::all();
        $user_posts = users_posts::whereUserId(Auth::id())
            ->get();


        return view('home', [
            'posts' => $sort,
            'votes' => $votes,
            'user_posts' => $user_posts
        ]);
    }
}
