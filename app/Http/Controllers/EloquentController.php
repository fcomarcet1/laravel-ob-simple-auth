<?php

namespace App\Http\Controllers;

use App\Models\ModelTable;
use App\Models\Role;
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
        /*for ($i=1; $i <= 3; $i++) {
            $modelTableCreate = ModelTable::create([
                'name' => 'Example_'.$i,
            ]);
        }*/

        $uid = 'haJqS9hq8xstfxE7PPd6gKnRMDpftNYV';
        $modelTableFind = ModelTable::find($uid);

        // update register
        /*$modelTableFind->name = 'Example_updated';
        $modelTableFind->save();*/

        $modelTableFind->update([
            'name' => 'Example_updated2',
        ]);

        //update or create register
        $modelTableFind->updateOrCreate([
            //'uid' => $uid,
            'uid' => 'ZaJqS9hq8xstfxE7PPd6gKnRMDpftNYZ'
        ], [
            'name' => 'Example_updated4',
        ]);

        print_r($modelTableFind); die();

        //$testModel = ModelTable::find(1);
    }

    public function testSoftDelete(){
        // we have field deleted_at in table users with not null values(deleted), we can restore,
        $user = User::whereNotNull('id')->restore();

        // restore soft deleted records
        $user = User::withTrashed()->get();

        // obtener valores borrados
        $user = User::onlyTrashed()->get();

    }

    public function withClause() {
        // with && withCount
        $users33 = User::whereNotNull('email_verified_at')
            ->orWhere('id', '>', 3)
            ->with('role')
            ->first();

        print_r($users33->fullname); die();

        // withCount obtenemos nº users relacionados con esta tabla
        $role = Role::withCount('user as administrator')->first();

        $role1 = User::join('roles', 'users.role_id', '=', 'roles.id')->get();

        print_r($role1); die();
        print_r($role); die();
        print_r($users33->role); die();

    }
}
