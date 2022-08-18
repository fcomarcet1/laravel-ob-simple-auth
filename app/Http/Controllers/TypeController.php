<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        /*$posts = Post::with('tags', 'category')->latest()->paginate(12);
        return view('posts.index', compact('posts'));*/

        return view('type.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request,  $id = null)
    {
        //
    }

    /*public function show($id) {
        $post = Post::with('tags', 'category')->findOrFail($id);
        return view('posts.show', compact('post'));
    }*/


    public function edit($id)
    {
        //
    }


    public function delete($id)
    {
    }
}
