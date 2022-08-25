<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class RoleController extends Controller
{
    public function index() {
        $roles = [
            [
                'id' => 1,
                'role' => 'Admin',
                'created_at' => '2022-01-01 15:31:00',
                'updated_at' => '2022-01-01 15:31:00'
            ],
            [
                'id' => 2,
                'role' => 'User',
                'created_at' => '2022-01-01 15:32:00',
                'updated_at' => '2022-01-01 15:32:00'
            ],
            [
                'id' => 3,
                'role' => 'root',
                'created_at' => '2022-01-01 15:32:00',
                'updated_at' => '2022-01-01 15:32:00'
            ],
        ];
        return view('roles.index', compact('roles'));
    }

    public function create(){
        return view('roles.form', [
            'id' => null,
            'record' => null
        ]);
    }

    /**
     * @throws Exception
     */
    public function store(Request $request, $id = null){

        /*if (($request->isMethod('POST') && $id !== null) ||
            $request->isMethod('PUT') ||
            ($request->isMethod('PATCH') && $id === null)
        ) {
            abort(403, 'Method not allowed');
        }*/

        $request->validate([
            'role' => 'required|string|max:255',
        ]);

        $role = [
            'id' => random_int(1, 100),
            'role' => $request->role,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if($id){
            $role['id'] = $id;
        }

        if ($request->isMethod('POST')){
            //$message = Session::flash('success', "Role with:" . $role['id']. "created successfully");
            return redirect()->route('roles.index')->with('success', 'Role:'.$request->role.' saved successfully');
        }
        if ($request->isMethod('PUT') || $request->isMethod('PATCH')){
            //$message = Session::flash('success', "Role with:" . $role['id']. "updated successfully");
            return redirect()->route('roles.index')->with('success', 'Role:'.$request->role.' updated successfully');
        }

        //return redirect()->route('roles.index')->with('success', 'Role:'.$request->role.' saved successfully');
        //return $role;
    }

    public function show($id){
        switch ($id){
            case 1:
                $roleType = 'Admin';
                break;
            case 2:
                $roleType = 'User';
                break;
            case 3:
                $roleType = 'root';
                break;
            default:
                $roleType = 'Unknown';
                break;
        }

        $role = [
            'id' => $id,
            'role' => $roleType,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        return view('roles.show', compact('role'));

    }

    /**
     * @throws Exception
     */
    public function edit($id){
        /*$role = match ($id) {
            1 => 'Admin',
            2 => 'Normal',
            3 => 'Root',
            default => null,
        };*/
        switch ($id){
            case 1:
                $role = 'Admin';
                break;
            case 2:
                $role = 'User';
                break;
            case 3:
                $role = 'root';
                break;
            default:
                $role = 'Unknown';
                break;
        }
        $record = [
            'id' => $id,
            'role' => $role,
            'created_at' => '2022-01-01 15:31:00',
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        return view('roles.form', [
            'id' => $id,
            'record' => $record,
        ]);
    }

    public function delete(Request $request , string $id) {
        //$request->session()->flash('message', 'Role with ID:'.$id.' deleted successfully');
        return redirect()->route('roles.index')->with('success', 'Role with ID:'.$id.' deleted successfully');
    }

}
