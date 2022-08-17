<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        return view('role.index');
    }

    public function create()
    {
        //
    }

    public function save(Request $request, $id = null){}

    public function edit($id)
    {
        //
    }

    public function delete($id){}

}
