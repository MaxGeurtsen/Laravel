<?php

namespace App\Http\Controllers;

use App\categories;
use App\posts;
use App\questions;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {

        $categories = categories::all();

        return view('create_post', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "question1" => 'required',
            "question2" => 'required',
            "category" => 'required'
        ]);

        $question1 = new questions();
        $question1->question = $request->get('question1');
        $question1->save();

        $question2 = new questions();
        $question2->question = $request->get('question2');
        $question2->save();

        $category = $request->get('category');
        $user = auth()->user();

        $post = new posts();
        $post->category_id = $category;
        $post->question_id_1 = $question1->id;
        $post->question_id_2 = $question2->id;
        $post->user_id = $user->id;
        $post->save();

        $categories = categories::all();

        return view('create_post', [
            'question1' => $question1,
            'question2' => $question2,
            'category' => $category,
            'categories' => $categories
        ]);


    }

}
