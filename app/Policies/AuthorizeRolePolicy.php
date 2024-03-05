<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class AuthorizeRolePolicy
{
    /**
     * Create a new policy instance.
     */
    public function AuthorizeRolePolicy(User $user, $roleId)
    {
        return $user->roles->pluck('role_id')->contains($roleId) ? 
               Response::allow()
               :
               Response::deny('You are unauthorized to access this module!');
    }
}
