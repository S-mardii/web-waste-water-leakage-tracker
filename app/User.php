<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function updateUserProfile($id, $name, $email, $password)
    {

        $this->table = "users";
        $query = [
            "id" => $id,
            "name" => $name,
            "email" => $email,
//            "phone" => $phone,
            "password" => bcrypt($password)
        ];


        if ($this->where("id", $id)
            ->update($query)
        ) {

            return 1;
        }

        return 0;
    }

    public function updateRole($user_id, $role_id)
    {
        $this->table = "users";
        $query = [
            "role_id" => $role_id
        ];
        if ($this
            ->where("id", $user_id)
            ->update($query)
        ) {
            return 1;
        } return 0;
    }
}
