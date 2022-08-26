<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Implementations\HomeRepository;
use App\Repositories\Implementations\UserRepository;


class HomeController extends Controller
{
    private HomeRepository $homeRepository;
    private UserRepository $userRepository;
    private User $user;

    public function __construct(
        HomeRepository $homeRepository,
        UserRepository $userRepository,
        User $userModel
    ) {
        $this->homeRepository = $homeRepository;
        $this->userRepository = $userRepository;
        $this->userModel = $userModel;
    }

    public function index() {
        $this->homeRepository->HelloWorld();
        $this->userRepository->HelloWorld();
        return view('home');
    }
}
