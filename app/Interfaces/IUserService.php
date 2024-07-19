<?php

namespace App\Interfaces;

use App\Models\User;

interface IUserService
{
    public function registerUser(User $user);
    public function loginUser(User $user);

}
