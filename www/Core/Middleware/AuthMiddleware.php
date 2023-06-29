<?php

namespace App\Core\Middleware;
use App\Core\Exception\ForbiddenException;
use App\Models\User;


class AuthMiddleWare extends Middleware
{
    private int $role;
    private User $user;

    public function __construct($role, User $user){
        $this->role = $role;
        $this->user = $user;
    }

    public function execute(){
        if($this->user->getRole() != $this->role){
            throw new \Exception();       //forbiddenexc ne marche pas pq ?
        }
    }
}