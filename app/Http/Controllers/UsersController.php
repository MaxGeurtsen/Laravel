<?php

namespace App\Http\Controllers;

use App\posts;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Table;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = posts::whereUserId(Auth::id())
            ->get();

        return view('profiel', [
            'posts' => $posts
        ]);
    }

    public function indexAll()
    {
        $users = users::all();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "email" => 'required|email|unique:users',
            "password1" => 'required|min:4',
            "password2" => 'required|min:4|same:password1',
        ]);

        $pass1 = $request->get('password1');
        $hashed = Hash::make($pass1, [
            'rounds' => 12,
        ]);

        $users = new users();
        $users->name = ucfirst($request->get('name'));
        $users->email = $request->get('email');
        $users->password = $hashed;
        $users->save();

        return view('welcome', [
            'name' => $users->name,
            'email' => $users->email
        ]);

    }


    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->get('id');

        $user = users::whereId($id)->first();

        return view('admin.users_detail', [
            'user' => $user
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $request->validate([
            "name" => 'required',
            "email" => 'required|email|unique:users',
            "type" => 'required'
        ]);

        $id = $request->get('id');

        $users = users::whereId($id)->first();
        $users->name = ucfirst($request->get('name'));
        $users->email = $request->get('email');
        $users->type = $request->get('type');
        $users->save();

        $users = users::all();

        return view('admin.users', [
            'users' => $users
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
