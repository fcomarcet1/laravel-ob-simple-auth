<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index() {
        $types = [
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
        return view('types.index', compact('types'));
    }

    public function create(){
        return view('types.form', [
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
            'type' => 'required|string|max:255',
        ]);

        $type = [
            'id' => random_int(1, 100),
            'role' => $request->role,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        /* dump($role); die();*/

        if($id){
            $type['id'] = $id;
        }
        return redirect()->route('types.index')->with('success', 'Type:'.$request->type.' saved successfully');
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

        $type = [
            'id' => $id,
            'role' => $roleType,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        return view('types.show', compact('type'));

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
                $type = 'Admin';
                break;
            case 2:
                $type = 'User';
                break;
            case 3:
                $type = 'root';
                break;
            default:
                $type = 'Unknown';
                break;
        }
        $record = [
            'id' => $id,
            'role' => $type,
            'created_at' => '2022-01-01 15:31:00',
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        return view('types.form', [
            'id' => $id,
            'record' => $record,
        ]);
    }

    public function delete(Request $request , string $id) {
        //$request->session()->flash('message', 'Role with ID:'.$id.' deleted successfully');
        return redirect()->route('types.index')->with('success', 'Type with ID:'.$id.' deleted successfully');
    }

}
