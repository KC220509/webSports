<?php

namespace App\Service;

use App\Models\User;
use Exception;
use Hash;
use Log;

class UserService{

    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($param){
        $user = [
            'name' => $param['name'],
            'email' => $param['email'],
            'password' => Hash::make($param['password'])
        ];

        return $this->user->create($user);
    }
}