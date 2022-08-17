<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return view('type.index');
    }


    public function create()
    {
        //
    }


    public function save(Request $request,  $id = null)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function delete($id)
    {
    }
}
