<?php

namespace App\Http\Controllers;

use App\posts;
use App\user_posts;
use App\users;
use App\users_posts;
use App\votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionsController extends Controller
{
    public function vote(Request $request)
    {

        $vote = new votes();
        $vote->question_id = $request->get('vote');
        $vote->user_id = Auth::user()->id;
        $vote->save();

        $up = new users_posts();
        $up->user_id = Auth::user()->id;
        $up->post_id = $request->get('id');
        $up->save();

        $posts = posts::all();
        $votes = votes::all();
        $user_posts = users_posts::all();

        return view('home', [
            'posts' => $posts,
            'votes' => $votes,
            'up' => $user_posts
        ]);
    }
}
