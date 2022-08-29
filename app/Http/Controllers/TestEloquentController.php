<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

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

        //print_r($user7);

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
            //->whereNull('deleted_at')
            ->get();


        // joins
        $users12 = DB::table('users')
            //->select('users.name', 'users.email', 'roles.role')
            ->selectRaw('users.*, roles.role, roles.level as role_level')
            ->where('users.id', 1)
            ->join('roles', 'users.role_id', '=', 'roles.id')
            //->rightJoin('roles', 'users.role_id', '=', 'roles.id')
            //->leftJoin('roles', 'users.role_id', '=', 'roles.id')
            //->crossJoin('roles')
            ->get();

        // if we need use the alias example:role_level --> use having clause
        $users13 = DB::table('users')
            ->selectRaw('users.*, roles.role, roles.level as role_level')
            ->where('users.id', 1)
            ->join('roles', 'users.role_id', '=', 'roles.id')
            //->having('role_level', 1)
            ->having('role_level', '>', 0)
            ->get();

        $users14 = DB::table('users')
            ->selectRaw('users.*, roles.level as role_level')
            ->where('users.id', 2)
            ->join('roles', 'users.role_id', '=', 'roles.id')
            //->having('role_level', 1)
            ->having('role_level', '>', 0)
            ->get();

        // Raw clauses. All methods are available in Raw mode.
        $users15 = DB::table('users')
            ->selectRaw('users.*, roles.level as role_level')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->whereRaw('users.id = 1')
            ->havingRaw('role_level > 0')
            ->orderByRaw('users.name asc')
            ->get();

        $users16 = DB::table('users')->select(DB::raw("name, email"))->get();


        // limit
        $users17 = DB::table('users')->limit(2)->get();

        //skip
        $users18 = DB::table('users')->limit(2)->skip(2)->get();
        $users19 = DB::table('users')->limit(5)->skip(2)->take(2)->get();

        // Insert data into table
        $usersInsert = DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Marie Doe',
            'email' => 'john@test.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            //'deleted_at' => null,
            ]);

        // Update data into table
        $usersUpdate = DB::table('users')->where('id', 1)->update([
            'role_id' => 3,
            'name' => 'Frank Doe',
            'email' => 'updated@test.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //Update or Insert data into table
        $usersUpdateOrInsert = DB::table('users')->updateOrInsert([
            'id' => 12],
            [
                'role_id' => 3,
                'name' => 'Manolo Doe',
                'email' => 'manolo@mail.es',
            ]);

        // decrement
        $usersDecrement = DB::table('users')->where('id', 1)->decrement('role_id', 1);

        //increment
        $usersIncrement = DB::table('users')->where('id', 1)->increment('role_id', 1);

        //truncate
        //$usersTruncate = DB::table('users')->truncate();

        // delete
        //$usersTruncate = DB::table('users')->whereIn('id', [1, 2, 3])->delete();


        print_r($users19); die();
        //return view('eloquent.index', compact('users'));
    }

}
