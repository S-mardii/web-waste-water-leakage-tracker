<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public function getUsers(){
        $this->table = "users";
        return $this
            ->join("roles", "roles.id", "=", "users.role_id")
            ->select("users.id", "users.name", "users.created_at", "users.email", "users.role_id", "roles.role")
            ->paginate(10);
    }
}
