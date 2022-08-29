<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestEloquentController extends Controller
{
    public function index() {

        // get all users
        $users1 = DB::table('users')->get();
        $users2 = DB::table('users')->get()->toArray();
        //print_r($users1);

        // get user with id = XX
        $user1 = DB::table('users')->find(1);
        $user3 = DB::table('users')->where('id', 3)->get();
        $user4 = DB::table('users')->where('id', 5)->get()->toArray();
        $user6 = DB::table('users')->where('id', 1)->first();
        $user7 = DB::table('users')->where('id', 1)->orWhere('id', 2)->orderBy('name', 'asc')->get();

        // get field name, email  from user with id = 5
        $user5 = DB::table('users')->select('name', 'email')->where('id', 5)->get();

        print_r($user7);

        /*foreach ($user7 as $user) {
            echo $user->name;
        }*/

        // get values between 2 dates
        $users8 = DB::table('users')
            ->whereBetween('created_at', ['2019-01-01 00:00:00', '2019-01-31 23:59:59'])
            ->get();

        // get values between 2 dates and ids 1,2,3
        $users9 = DB::table('users')
            ->whereBetween('created_at', ['2019-01-01 00:00:00', '2019-01-31 23:59:59'])
            ->whereIn('id', [1, 2, 3])
            ->get();
        // get values where name != null and between 2 dates and ids 1,2,3 and order by name
        $users10 = DB::table('users')
            ->where('name', '!=', null)
            // ->where('name', '<>', null) ,
            // ->whereNotNull('name')
            ->whereBetween('created_at', ['2019-01-01 00:00:00', '2019-01-31 23:59:59'])
            ->whereIn('id', [1, 2, 3])
            ->orderBy('name', 'asc')
            ->get();

        // get values where name != null and contains A and between 2 dates and ids 1,2,3 and order by name
        $users11 = DB::table('users')
            ->where('name', '!=', null) // ->where('name', '<>', null) , ->whereNotNull('name')
            ->where('name', 'like', '%A%')
            ->whereBetween('created_at', ['2019-01-01 00:00:00', '2019-01-31 23:59:59'])
            ->whereIn('id', [1, 2, 3])
            ->orderBy('name', 'asc')
            ->get();


        $users11 = DB::table('users')
            ->whereRaw('id = 1')
            //->whereRaw('(id = 1 or id = 2)')
            //->whereRaw('name like ?', ['%A%'])
            ->whereNull('deleted_at')
            ->get();

        //return view('eloquent.index', compact('users'));
    }

}