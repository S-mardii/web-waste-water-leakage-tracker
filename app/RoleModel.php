<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    public function getRoles(){
        $this->table = "roles";
        return $this->get();
    }
}
