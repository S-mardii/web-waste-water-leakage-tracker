<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosterModel extends Model
{

    public function getPosters(){
        $this->table = "posters";
        return $this->get();
    }

    public function updatePost($id, $name, $phone)
    {
        $this->table = "posters";
        $query = [
            "id" => $id,
            "name" => $name,
            "phone" => $phone,
        ];

        if ($this->where("id", $id)
            ->update($query)) {

            return 1;
        }

        return 0;
    }
}
