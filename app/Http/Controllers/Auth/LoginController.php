<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse {
        $input = $request->only('email', 'password');
        $access = $this->_checkCredentials($input);

        if (!$access){
            $request->session()->flash('error', 'Invalid email or password');
            //Session::flash('error', 'Invalid email or password credentials');
            return redirect()->back();
        }
        //Session::input('user', $input);
        $request->session()->put('user', $input);
        return redirect()->route('home')->with('success', 'Login successful. Welcome back '.$input['email'].'!');


    }

    public function logout() {
        if (session()->has('user')) {
            Session::flush();
            session()->forget('user');
            Auth::logout();
            return redirect()->route('login')->with('success', 'Logout successful!');
        }

        /* if (session()->has('user')) {
             session()->forget('user');
             return redirect()->route('login');
         }*/
    }

    private function _checkCredentials($input): bool {

        if (!isset($input['email'], $input['password'])){
            return false;
        }

        return $this->_checkUserAndPassword($input['email'], $input['password']);
    }

    private function _checkUserAndPassword($user, $password): bool {
        $user = User::where('email', $user)->first();
        if (!(Hash::check($password, $user->password) && $user)) {
            return false;
        }
        return true;
    }

}
