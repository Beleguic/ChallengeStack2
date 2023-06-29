<?php
namespace App\Core\Middleware;

use App\Models\User;

class AuthMiddleware extends Middleware
{
    private int $role;
    private User $user;

    public function __construct($role,User $user){
        $this->role = $role;
        $this->user = $user;
    }

    public function execute(){
        if($this->user->getStatus() != $this->role){
            echo "pas le droit d'être la enflure";
        }
    }
}


?>