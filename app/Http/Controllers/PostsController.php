<?php

namespace App\Http\Controllers;

use App\categories;
use App\posts;
use App\questions;
use App\users_posts;
use App\votes;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function create()
    {

        $categories = categories::all();

        return view('create_post', [
            'categories' => $categories
        ]);
    }

    public function index(Request $request)
    {
        $id = $request->get('id');

        $post = posts::whereId($id)
            ->first();

        $categories = categories::all();
        $votes = votes::all();

        return view('detail', [
            'post' => $post,
            'categories' => $categories,
            'votes' => $votes
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
        $succes = true;

        return view('create_post', [
            'succes' => $succes,
            'categories' => $categories
        ]);


    }

    public function active(Request $request)
    {

        $active = $request->get('input');
        $id = $request->get('id');

        if ($active == 'on') {
            posts::whereId($id)
                ->update(['active' => null]);

        } elseif ($active == 'off') {
            posts::whereId($id)
                ->update(['active' => '1']);
        }


        $post = posts::whereId($id)
            ->first();
        $categories = categories::all();
        $votes = votes::all();

        return view('detail', [
            'post' => $post,
            'categories' => $categories,
            'votes' => $votes
        ]);
    }


    public function filter(Request $request)
    {

        $category = $request->get('category');
        $text = $request->get('text');
        $posts = [];

        if (!$category && !empty($text)) {
            $question = questions::whereQuestion($text)
                ->get('id');

            foreach ($question as $quest) {
                $q = posts::whereQuestionId_1($quest->id)
                    ->first();
                if (!empty($q)) {
                    $posts = Arr::prepend($posts, $q);
                }
            }
            foreach ($question as $quest) {
                $q = posts::whereQuestionId_2($quest->id)
                    ->first();
                if (!empty($q)) {
                    $posts = Arr::prepend($posts, $q);

                }
            }
        } elseif (!$text && !empty($category)) {
            $posts = posts::whereCategoryId($category)
                ->get();

        } elseif (!$text && !$category) {
            $posts = posts::all()->sortByDesc('created_at');

        } elseif (!empty($text) && !empty($category)) {
            $question = questions::whereQuestion($text)
                ->get('id');

            foreach ($question as $quest) {
                $q = posts::whereQuestionId_1($quest->id)
                    ->whereCategoryId($category)
                    ->first();
                if (!empty($q)) {
                    $posts = Arr::prepend($posts, $q);
                }
            }
            foreach ($question as $quest) {
                $q = posts::whereQuestionId_2($quest->id)
                    ->whereCategoryId($category)
                    ->first();
                if (!empty($q)) {
                    $posts = Arr::prepend($posts, $q);
                }
            }
        }

        $votes = votes::all();
        $user_posts = users_posts::whereUserId(Auth::id())
            ->get();
        $categories = categories::all();


        return view('home', [
            'posts' => $posts,
            'votes' => $votes,
            'user_posts' => $user_posts,
            'categories' => $categories
        ]);
    }
}
