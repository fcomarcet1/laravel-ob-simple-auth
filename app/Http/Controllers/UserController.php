<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{

    public function index() {

        return view('user.index');
    }


    public function create()
    {
        /*abort_if(Gate::denies('create-user'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('user.create');*/
    }


    public function save(Request $request, $id = null)
    {
        //
    }


    /*public function edit(User $user)
    {
        abort_if(Gate::denies('edit-user', $user), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('user.edit', compact('user'));
    }*/

    public function edit($id)
    {
        //
    }


    public function delete($id)
    {
    }
}
