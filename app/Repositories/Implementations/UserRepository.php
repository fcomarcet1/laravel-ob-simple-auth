<?php
declare(strict_types=1);


namespace App\Repositories\Implementations;

use App\Models\User;

class UserRepository
{
    protected User $userModel;

    // constructor
    public function __construct(User $userModel) {
        $this->userModel = $userModel;
    }

    public function HelloWorld(): void {
        echo 'Hello from UserRepository';
    }

}
