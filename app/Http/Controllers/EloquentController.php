<?php

namespace App\Http\Controllers;

use App\Models\ModelTable;
use App\Models\User;
use Illuminate\Http\Request;

class EloquentController extends Controller
{
    public function index() {
        // get all users
        $users1 = User::get();
        $users = User::all();

        //get first user
        $users2 = User::first();
        $user3 = User::where('id', 500)->firstOrFail();

        //get user with id = 1
        $user1 = User::find(1);

        //Change user name && save
        $user1->name = 'New Name';
        $user1->save();

        //Change user name && email with fill
        $user1->fill([
            'name' => 'New Name 2',
            'email' => 'newemail@mail.com',
        ]);
        $user1->save();

        // If deleted_at != null we can get user with withTrashed()
        //$user2 = User::withTrashed()->find(1);
        //$user2->restore();
        //$user2->save();

        print_r($user3); die();
    }

    public function testCustomModel(){

        // create new register
        $modelTableCreate = ModelTable::create([
            'name' => 'Example',
        ]);

        //$testModel = ModelTable::find(1);
    }
}