<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


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
        return redirect()->route('home');
    }

    public function logout() {
        if (session()->has('user')) {
            session()->forget('user');
            return redirect()->route('login');
        }
    }

    private function _checkCredentials($input): bool {
        $credentials = [
            'email' => 'fcomarcet1@gmail.com',
            'password' => 'a636585669*'
        ];

        if (!isset($input['email'], $input['password'])){
            return false;
        }

        return $credentials['email'] === $input['email'] && $credentials['password'] === $input['password'];
    }
}
