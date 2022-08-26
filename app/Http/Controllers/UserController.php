<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{

    /**
     * @throws Exception
     */
    public function index() {

        $users =  [
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'created_at' => '2021-01-01 15:30:20',
                'updated_at' => '2021-01-01 15:30:20',
            ],
            [
                'id' => 2,
                'name' => 'frank',
                'email' => 'frank@admin.com',
                'created_at' => '2021-02-01 15:31:20',
                'updated_at' => '2021-02-01 15:31:20',
            ],
            [
                'id' => 2,
                'name' => 'lerele',
                'email' => 'lerele@admin.com',
                'created_at' => '2021-03-01 15:32:20',
                'updated_at' => '2021-03-01 15:32:20',
            ]

        ];

        return view('user.index', compact('users'));
    }


    public function create()
    {
        /*abort_if(Gate::denies('create-user'), Response::HTTP_FORBIDDEN, '403 Forbidden');*/
        return view('user.form', [
            'id' => null,
            'record' => null
        ]);
    }


    public function store(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            //'email' => 'required|string|email|max:255|unique:users',
        ]);

        $user = [
            'id' => random_int(1, 100),
            'name' => $request->name,
            'email' => $request->email,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if($id){
            $user['id'] = $id;
        }

        if ($request->isMethod('POST')){
            //$message = Session::flash('success', "Role with:" . $role['id']. "created successfully");
            return redirect()->route('user.index')->with('success', 'User:'.$request->email.' saved successfully');
        }
        if ($request->isMethod('PUT') || $request->isMethod('PATCH')){
            //$message = Session::flash('success', "Role with:" . $role['id']. "updated successfully");
            return redirect()->route('user.index')->with('success', 'User:'.$request->email.' updated successfully');
        }
    }

    public function show($id)
    {
        switch ($id){
            case 1:
                $name = 'Admin';
                $email = 'admin@admin.com';
                break;
            case 2:
                $name = 'Marie';
                $email = 'marie@marie.com';
                break;
            case 3:
                $name = 'lerele';
                $email = 'lerele@letrele.com';
                break;
            default:
                $name = 'Unknown';
                $email = 'Unknown';
                break;
        }

        $user = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        //abort_if(Gate::denies('edit-user', $user), Response::HTTP_FORBIDDEN, '403 Forbidden');
        switch ($id){
            case 1:
                $name = 'Admin';
                $email = 'admin@admin.com';
                break;
            case 2:
                $name = 'Marie';
                $email = 'marie@marie.com';
                break;
            case 3:
                $name = 'lerele';
                $email = 'lerele@letrele.com';
                break;
            default:
                $name = 'Unknown';
                $email = 'Unknown';
                break;
        }
        $record = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'created_at' => '2022-01-01 15:31:00',
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        return view('user.form', [
            'id' => $id,
            'record' => $record,
        ]);
    }


    public function delete($id)
    {
        return redirect()->route('user.index')
            ->with('success', 'User with ID:'.$id.' deleted successfully');

    }
}
