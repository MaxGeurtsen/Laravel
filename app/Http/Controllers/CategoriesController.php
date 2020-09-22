<?php

namespace App\Http\Controllers;

use App\categories;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoriesController extends Controller
{
    public function index()
    {


        return view('admin.create_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            "category" => 'required|unique:categories',
        ]);

        $categories = new categories();
        $categories->category = $request->get('category');
        $categories->save();


        return view('admin.create_category', [
            'categories' => $categories
        ]);

    }
}
