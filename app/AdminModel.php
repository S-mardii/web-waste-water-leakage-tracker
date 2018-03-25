<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    public function role(){
        $this->table = "roles";
        return $this->get();
    }

}
